<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Mail;

use App\Header;
use App\Break1;
use App\Service;
use App\ServiceService;
use App\ServiceRequirement;
use App\Break2;
use App\Pack;
use App\PackService;
use App\PackRequirement;
use App\Break3;
use App\Article;

class WebController extends Controller
{
    public function index()
    {
		$headers  = Header::orderBy('id', 'DESC')->get();
		$breaks_1 = Break1::orderBy('id', 'DESC')->get();
		$services = Service::orderBy('id', 'ASC')->where('status', true)->paginate(7);
		$breaks_2 = Break2::orderBy('id', 'DESC')->get();
		$packs    = Pack::orderBy('id', 'ASC')->where('status', true)->paginate(3);
		$breaks_3 = Break3::orderBy('id', 'DESC')->get();
		$articles = Article::orderBy('id', 'DESC')->where('status', true)->paginate(3);
    	return view('web.index.index')
    			->with('headers', $headers)
    			->with('breaks_1', $breaks_1)
    			->with('services', $services)
    			->with('breaks_2', $breaks_2)
    			->with('packs', $packs)
    			->with('breaks_3', $breaks_3)
    			->with('articles', $articles);
    }

    public function service($slug)
    {
		$service      = Service::where('slug', $slug)->first();
		$services     = Service::orderBy('id', 'ASC')->paginate(7);
		$ser_services = ServiceService::orderBy('id', 'ASC')->where('service_id', $service->id)->where('status', true)->get();
		$req_services = ServiceRequirement::orderBy('id', 'ASC')->where('status', true)->get();
		return view('web.services.show')
				->with('service', $service)
				->with('services', $services)
				->with('ser_services', $ser_services)
				->with('req_services', $req_services);
    }

    public function pack($slug)
    {
		$pack      = Pack::where('slug', $slug)->first();
		$packs     = Pack::orderBy('id', 'ASC')->paginate(3);
		$ser_packs = PackService::orderBy('id', 'ASC')->where('pack_id', $pack->id)->where('status', true)->get();
		$req_packs = PackRequirement::orderBy('id', 'ASC')->where('status', true)->get();
		return view('web.packs.show')
				->with('pack', $pack)
				->with('packs', $packs)
				->with('ser_packs', $ser_packs)
				->with('req_packs', $req_packs);
    }

    public function news()
    {
    	$articles = Article::orderBy('id', 'DESC')->where('status', true)->simplePaginate(6);
    	return view('web.news.index')
    			->with('articles', $articles);
    }

    public function news_show($slug)
    {
    	$article = Article::where('slug', $slug)->first();
    	return view('web.news.show')
    			->with('article', $article);
    }

    public function contact(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'name'    => 'required|min:2',
                'company' => 'required|min:2',
                'email'   => 'email|required',
                'tel'     => 'required|min:2',
                'message' => 'required|min:2'
            ];

            $messages = [
                'name.required'    => ' Este campo es necesario',
                'name.min'         => ' Mínimo 2 caracteres',
                
                'company.required' => ' Este campo es necesario',
                'company.min'      => ' Mínimo 2 caracteres',
                
                'email.required'   => ' Este campo es necesario',
                'email.email'      => ' No tiene formato de email',
                
                'tel.required'     => ' Este campo es necesario',
                'tel.min'          => ' Mínimo 2 caracteres',
                
                'message.required' => ' Este campo es necesario',
                'message.min'      => ' Mínimo 2 caracteres'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'fail'   => true,
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } elseif ($validator->passes()) {                
     //            $data = [
                    // 'name'    => $request->name,
                    // 'company' => $request->company,
                    // 'email'   => $request->email,
                    // 'tel'     => $request->tel,
                    // 'message' => $request->message
     //            ];

     //            Mail::send('emails.contact', $data, function($message) use ($data) {
     //                $message->to('correo@jeffco.com.mx', 'Carlos Jeffery')->subject($data['name'] . ' contactó');
     //                $message->from('notificaciones@jeffco.com.mx', 'Notificaciones JeffCo');
     //            });

                return response()->json([
                    'send' => true
                ]);
            }
        }
    }
}
