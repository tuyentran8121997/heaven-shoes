<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CmsPage;
use App\Category;
use Illuminate\Support\Facades\Mail;
use App\Enquiry;

class CmsController extends Controller
{
    public function addCmsPage(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $cmspage = new CmsPage;
            $cmspage->title = $data['title'];
            $cmspage->url = $data['url'];
            $cmspage->description = $data['description'];
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            $cmspage->status = $status;
            $cmspage->save();
            return redirect()->back()->with('flash_message_success','Trang CMS đã được thêm thành công!');
        }
        return view('admin.pages.add_cms_page');
    }

    public function editCmsPage(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            CmsPage::where('id',$id)->update(['title'=>$data['title'],'url'=>$data['url'],'description'=>$data['description'],'status'=>$status]);
            return redirect()->back()->with('flash_message_success','Trang CMS đã được cập nhật thành công!');
        }
        $cmsPage = CmsPage::where('id',$id)->first();
        return view('admin.pages.edit_cms_page')->with(compact('cmsPage'));
    }

    public function viewCmsPages(){
        $cmsPages = CmsPage::get();
        return view('admin.pages.view_cms_pages')->with(compact('cmsPages'));
    }

    public function deleteCmsPage($id){
        CmsPage::where('id',$id)->delete();
        return redirect('/admin/view-cms-pages')->with('flash_message_success','Trang CMS đã được xóa thành công!');
    }

    public function cmsPage($url){
        //404
        $cmsPageCount = CmsPage::where(['url'=>$url,'status'=>1])->count();
        if($cmsPageCount>0){
            // Get CMS page Details
            $cmsPageDetails = CmsPage::where('url',$url)->first();
        }else{
            abort(404);
        }

        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        return view('pages.cms_page')->with(compact('cmsPageDetails','categories'));
    }

    public function contact(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $enquiry = new Enquiry;
            $enquiry->name = $data['name'];
            $enquiry->email = $data['email'];
            $enquiry->subject = $data['subject'];
            $enquiry->message = $data['message'];
            $enquiry->save();

            //mail 
            $email = "tuyentran8121997@gmail.com";
            $messageData = [
                'name' =>$data['name'],
                'email'=>$data['email'],
                'subject'=>$data['subject'],
                'comment'=>$data['message']
            ];
            Mail::send('emails.enquiry',$messageData,function($message)use($email){
                $message->to($email)->subject("Xác nhận từ Heaven Shoes!");
            });

            return redirect()->back()->with('flash_message_success','Cảm ơn đã liên hệ với chúng tôi. Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất.');
        }
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('pages.contact')->with(compact('categories'));
    }

    public function viewEnquiries(){
        $enquiries = Enquiry::orderBy('id','Desc')->get();
        return view('admin.enquiries.view_enquiries')->with(compact('enquiries'));
    }

    public function deleteEnquiry($id = null){
        if(!empty($id)){
            Enquiry::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Phản hồi đã được xóa thành công!');
        }
    }
}
