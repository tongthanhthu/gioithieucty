<?php

namespace App\Services;

use App\Mail\RecruitmentMail;
use App\Models\Benefit;
use App\Models\CurriculumVitae;
use App\Models\Logo;
use App\Models\Recruitment;
use App\Models\RecruitmentBenefit;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\CurriculumVitae\CurriculumVitaeRepository;
use App\Repositories\Logo\LogoRepository;
use App\Repositories\Recruitment\RecruitmentRepository;
use App\Repositories\RecruitmentBenefit\RecruitmentBenefitRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Return_;

/**
 * Class RecruitmentService
 * @package App\Services\RecruitmentService
 */
class RecruitmentService
{
    protected $recruitmentRepository;
    protected $logoRepository;
    protected $curriculumVitaeRepository;
    protected $recruitmentBenefitRepo;
    protected $contactRepository;

    public function __construct(
        RecruitmentRepository $recruitmentRepository,
        LogoRepository $logoRepository,
        CurriculumVitaeRepository $curriculumVitaeRepository,
        RecruitmentBenefitRepository $recruitmentBenefitRepo,
        ContactRepository $contactRepository
    ) {
        $this->recruitmentRepository = $recruitmentRepository;
        $this->logoRepository = $logoRepository;
        $this->curriculumVitaeRepository = $curriculumVitaeRepository;
        $this->recruitmentBenefitRepo = $recruitmentBenefitRepo;
        $this->contactRepository = $contactRepository;
    }
    public function getAll($params = null)
    {
        return $this->recruitmentRepository
            ->with('benefits')
            ->when($params, function ($q) use ($params) {
                if ($params['slug']) {
                    $q->whereHas('jobCategory', function ($query) use ($params) {
                        $query->where('slug_vi', $params['slug'])->orWhere('slug_en', $params['slug'])
                        ->orWhere('slug_jp', $params['slug'])->orWhere('slug_kr', $params['slug']);
                    });
                }
            })
            ->orderByDesc('updated_at')
            ->paginate(10);
    }

    public function getLogo()
    {
        return $this->logoRepository->where('status', true)->orderByDesc('updated_at')->first();
    }

    public function get($id)
    {
        return $this->recruitmentRepository->where('id', $id)->with('images')->first();
    }

    public function getBySlug($slug)
    {
        return $this->recruitmentRepository->where('slug_vi', $slug)
            ->orWhere('slug_en', $slug)
            ->orWhere('slug_jp', $slug)
            ->orWhere('slug_kr', $slug)
            ->with('benefits')->first();
    }

    public function getOptions()
    {
        return Benefit::query()->orderBy('id')->get();
    }

    public function add($request)
    {
        DB::beginTransaction();
        try {
            $recruitment = $this->recruitmentRepository->create($request);

            $recruitmentBenefit = [];
            if ($request['welfare']) {
                foreach (explode(',', $request['welfare']) as $benefitId) {
                    $recruitmentBenefit[] = [
                        "recruitment_id" => $recruitment['id'],
                        "benefit_id"     => $benefitId,
                        "created_by"     => auth() ? auth()->id() : '',
                        "created_at"     => Carbon::now(),
                        "updated_at"     => Carbon::now(),
                    ];
                }
                $this->recruitmentBenefitRepo->insert($recruitmentBenefit);
            }
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);

            return false;
        }
    }

    public function findId($id)
    {
        return  $this->recruitmentRepository->find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $this->recruitmentRepository->update($request, $id);
            $recruitmentBenefit = [];
            if ($request['welfare']) {
                $this->recruitmentBenefitRepo->where('recruitment_id', $id)->delete();
                foreach (explode(',', $request['welfare']) as $benefitId) {
                    $recruitmentBenefit[] = [
                        "recruitment_id" => $id,
                        "benefit_id"     => $benefitId,
                        "created_by"     => auth() ? auth()->id() : '',
                        "created_at"     => Carbon::now(),
                        "updated_at"     => Carbon::now(),
                    ];
                }
                $this->recruitmentBenefitRepo->insert($recruitmentBenefit);
            }
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e);
            return false;
        }
    }

    public function delete($id)
    {
        $recruitment = $this->recruitmentRepository->find($id);
        if (!$recruitment) {
            return redirect(route('admin.recruitments.index'))->with('msg', 'Không tìm thấy sản phẩm');
        }
        $recruitment->delete();

        return redirect()->back()->with('msg', 'Xóa sản phẩm thành công');
    }

    public function sendMail($request)
    {
        DB::beginTransaction();
        try {
            $contact =  $this->contactRepository ->first();
            if(isset($contact) && isset($contact->email)){
                Mail::to($contact->email)->send(new RecruitmentMail($request));
                $this->uploadFile($request);
                DB::commit();

                return true;
            }
            return false;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e);

            return false;
        }
    }

    public function uploadFile($request)
    {
        $nameFile     = Carbon::now()->format('ymdHis') . $request['file']->getClientOriginalName();
        $path         = $request['file']->storeAs('public/uploads/cvs', $nameFile);
        $data       = [
            "username"    => $request['name'],
            "phone"       => $request['phone'],
            "title"       => $request['title'],
            "email"       => $request['email'],
            "description" => $request['contents_description'],
            "path"        => str_replace("public/", '', $path),
        ];

        $this->curriculumVitaeRepository->create($data);
    }
}
