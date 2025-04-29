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
use App\Models\About;
use App\Models\Category;
use App\Models\CategoryImage;
use App\Models\Goals;
use App\Models\GovernanceFile;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;

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
        $data['categories'] = ListResource::collection( Category::where('status',1)->orderBy('id','ASC')->get() );
        $data['pages'] = ListResource::collection( About::where('status',1)->orderBy('id','ASC')->get() );
        $data['settings'] = SettingResource::make( Setting::find(1) );

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
    public function about()
    {
        $data['pages'] = PageResource::make( About::findOrFail(1) );
        $data['goals'] = GoalsResource::collection( Goals::where('status',1)->limit(10)->get() );
        $data['clients'] = PartnerResource::collection( Goals::where('status',1)->get() );
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

        $data['members'] = MembersResource::collection( members::paginate(10) )->response()->getData(true);

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
    public function governance()
    {

        $data['members'] = GovernanceFileResource::collection( GovernanceFile::where('status',1)->paginate(10) )->response()->getData(true);

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
    public function category($id)
    {

        $data['category'] = CategoryImagesResource::make( CategoryImage::where('category_id',$id)->get() );
        $data['category_slider'] = CategoryResource::make( Category::findOrFail($id) );
        $data['projects'] = ProjectsResource::collection( Project::where('category_id',$id)->where('status',1)->paginate(10) )->response()->getData(true);

        return msgdata(true, trans('lang.data_display_success'), $data, success());

    }
}
