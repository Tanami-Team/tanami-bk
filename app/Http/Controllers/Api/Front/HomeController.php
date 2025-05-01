<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Front\AboutResource;
use App\Http\Resources\Api\Front\CategoryResource;
use App\Http\Resources\Api\Front\PartnerResource;
use App\Http\Resources\Api\Front\ProjectsResource;
use App\Http\Resources\Api\Front\SettingResource;
use App\Http\Resources\Api\Front\SliderResource;
use App\Http\Resources\CategoryImagesResource;
use App\Http\Resources\GoalsResource;
use App\Http\Resources\GovernanceFileResource;
use App\Http\Resources\ListResource;
use App\Http\Resources\MembersResource;
use App\Http\Resources\PageResource;
use App\Http\Resources\ProjectActivitesResource;
use App\Http\Resources\ProjectFileResource;
use App\Models\About;
use App\Models\Category;
use App\Models\CategoryImage;
use App\Models\Client;
use App\Models\Goals;
use App\Models\GovernanceFile;
use App\Models\Member;
use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectActivite;
use App\Models\ProjectFile;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        $setting = Setting::find(1);
        $data['video_section'] = $setting->home_video;
        $data['category_section'] = CategoryResource::collection( Category::where('status',1)->orderBy('id','ASC')->With('Projects')->get() );
        $data['about_section'] = AboutResource::make( About::where('show_home',1)->first() );
        $data['slider_section'] = SliderResource::collection( Slider::where('status',1)->limit(5)->InRandomOrder()->get() );
        $data['partners_section'] = PartnerResource::collection( Partner::where('status',1)->limit(12)->InRandomOrder()->get() );
        $data['settings'] = SettingResource::make( $setting );

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }

    public function header()
    {
        $data['categories'] = ListResource::collection( Category::where('status',1)->orderBy('id','ASC')->get() );
        $data['pages'] = ListResource::collection( About::where('status',1)->orderBy('id','ASC')->get() );
        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }


    public function footer()
    {
        $data['categories'] = CategoryResource::collection( Category::where('status',1)->With('Projects')->limit(3)->orderBy('id','ASC')->get() );
        $data['pages'] = ListResource::collection( About::where('status',1)->orderBy('id','ASC')->get() );
        $data['settings'] = SettingResource::make( Setting::find(1) );

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
    public function about()
    {
        $data['pages'] = PageResource::make( About::findOrFail(1) );
        $data['goals'] = GoalsResource::collection( Goals::where('status',1)->limit(10)->get() );
        $data['clients'] = PartnerResource::collection( Client::where('status',1)->get() );
        $data['Partners'] = PartnerResource::collection( Partner::where('status',1)->get() );

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
    public function page2($id)
    {
        $data['pages'] = PageResource::make( About::findOrFail($id) );
        $data['goals'] = GoalsResource::collection( Goals::where('status',1)->limit(10)->get() );
        $data['clients'] = PartnerResource::collection( Goals::where('status',1)->get() );
        $data['Partners'] = PartnerResource::collection( Partner::where('status',1)->get() );

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
    public function members()
    {

        $data['pages'] = PageResource::make( About::findOrFail(1) );
        $data['members'] = MembersResource::collection( Member::paginate(10) )->response()->getData(true);

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
    public function governance()
    {

        $data['pages'] = PageResource::make( About::findOrFail(1) );
        $data['GovernanceFile'] = GovernanceFileResource::collection( GovernanceFile::where('status',1)->paginate(10) )->response()->getData(true);

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
    public function category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        $data['category'] = CategoryResource::make( Category::findOrFail($request->category_id) );
        $data['category_slider'] = CategoryImagesResource::collection( CategoryImage::where('category_id',$request->category_id)->get() );
        $data['projects'] = ProjectsResource::collection( Project::where('category_id',$request->category_id)->where('status',1)->paginate(10) )->response()->getData(true);

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
    public function Project(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:projects,id',
        ]);
        if (!is_array($validator) && $validator->fails()) {
            return msg(false, $validator->errors()->first(), validation());
        }
        $data['project'] = ProjectsResource::make( Project::where('id',$request->project_id)->where('status',1)->first() )->response()->getData(true);
        $data['project_activites'] = ProjectActivitesResource::collection( ProjectActivite::where('project_id',$request->project_id)->where('status',1)->get() )->response()->getData(true);
        $data['project_files'] = ProjectFileResource::collection( ProjectFile::where('project_id',$request->project_id)->where('status',1)->get() )->response()->getData(true);

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
}
