<?php

namespace App\Services\Back\Educations;

use App\Repositories\Contracts\CourseInterfaceRepository;
use App\Repositories\Contracts\DepartmentInterfaceRepository;
use App\Services\Back\Services;
use App\Services\Traits\CrudableService;
use Illuminate\Support\Facades\DB;

class CourseAdminService extends Services
{
    use CrudableService;

    protected $path = 'contents.admin.courses';
    protected $route = 'course';

    protected $departmentRepository;

    public function __construct(
        CourseInterfaceRepository $courseRepository,
        DepartmentInterfaceRepository $departmentRepository
    ) {
        $this->repository = $courseRepository;
        $this->departmentRepository = $departmentRepository;
    }


    /**
     * create prepare for view
     *
     * @return array
     */
    public function create()
    {
        return ['departments' => $this->departmentRepository->getAllByTitleAndId()];
    }

    /**
     * create prepare for view
     * @param int $course_id
     * @return array
     */
    public function edit(
        $course_id
    ) {
        
       

        $get_lang=DB::table('language')
        ->where('lang_type', 'Audio')->get();

        $get_lang_cap=DB::table('language')
        ->where('lang_type', 'Caption')->get();

        $version = DB::table('versions')->get();

        return [
            'course' => $this->repository->findById($course_id),
            'departments' => $this->departmentRepository->getAllByTitleAndId(),
            'get_lang' => $get_lang,
            'get_lang_cap' => $get_lang_cap,
            'version' => $version

        ];
    }
}
