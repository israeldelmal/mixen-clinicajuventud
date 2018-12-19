<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use Validator;
use Auth;
use File;

use App\User;
use App\Header;
use App\Break1;
use App\Break2;
use App\Break3;
use App\Article;
use App\Pack;
use App\PackService;
use App\PackRequirement;
use App\Service;
use App\ServiceService;
use App\ServiceRequirement;
use App\Profile;

class DashboardController extends Controller
{
	// Index
    public function index()
    {
        $count_users    = User::orderBy('id', 'DESC')->get();
        $count_articles = Article::orderBy('id', 'DESC')->get();
        $count_packs    = Pack::orderBy('id', 'DESC')->get();
        $count_services = Service::orderBy('id', 'DESC')->get();
        $users          = User::orderBy('id', 'DESC')->paginate(5);
        $articles       = Article::orderBy('id', 'DESC')->paginate(5);
        $packs          = Pack::orderBy('id', 'DESC')->where('status', true)->get();
        $services       = Service::orderBy('id', 'DESC')->where('status', true)->get();
    	return view('dashboard.index.index')
                ->with('count_users', $count_users)
                ->with('count_articles', $count_articles)
                ->with('count_packs', $count_packs)
                ->with('count_services', $count_services)
                ->with('users', $users)
                ->with('articles', $articles)
                ->with('packs', $packs)
                ->with('services', $services);
    }

    // Usuarios
    public function users()
    {
    	$users = User::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.users.index')
    			->with('users', $users);
    }

    public function users_edit($id)
    {
    	$user = User::find($id);
    	return view('dashboard.users.edit')
    			->with('user', $user);
    }

    // Usuario
    public function user($id)
    {
        $user = User::find($id);
        return view('dashboard.users.user')
                ->with('user', $user);
    }

    public function user_update(Request $request, $id)
    {
        $rules = [
            'name'     => 'required|min:4',
            'lastname' => 'required|min:4',
        ];

        $messages = [            
            'name.required'     => 'Este campo es requerido',
            'name.min'          => 'Mínimo 4 caracteres',
            
            'lastname.required' => 'Este campo es requerido',
            'lastname.min'      => 'Mínimo 4 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $user           = User::find($id);
            $user->name     = $request->name;
            $user->lastname = $request->lastname;
            $user->save();

            return redirect()->back();
        }
    }

    // Home
    public function headers($id)
    {
        $header = Header::find($id);
        return view('dashboard.home.headers')
                ->with('header', $header);
    }

    public function headers_update(Request $request, $id)
    {
        $rules = [
            'h1'  => 'required|min:4',
            'sub' => 'required|min:4',
            'img' => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'h1.required'    => 'Este campo es necesario',
            'h1.min'         => 'Mínimo 4 caracteres',
            
            'sub.required'   => 'Este campo es necesario',
            'sub.min'        => 'Mínimo 4 caracteres',
            
            'img.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'        => 'Peso máximo de 5MB',
            'img.dimensions' => 'Las medidas son de 1920x1080',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $headers      = Header::find($id);
            $headers->h1  = $request->h1;
            $headers->sub = $request->sub;

            if ($request->hasFile('img')) {
                File::delete(public_path() . '/assets/images/cabecera/' . $headers->img);

                $image = $request->file('img');
                $name  = uniqid('header_', true) . '.' . $image->getClientOriginalExtension();
                $path  = public_path() . '/assets/images/cabecera/';
                $image->move($path, $name);

                $headers->img = $name;
            }

            $headers->save();

            return redirect()->back();
        }
    }

    public function break1($id)
    {
        $break = Break1::find($id);
        return view('dashboard.home.break1')
                ->with('break', $break);
    }

    public function break1_update(Request $request, $id)
    {
        $rules = [
            'h1'  => 'required|min:4',
            'img' => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'h1.required'    => 'Este campo es necesario',
            'h1.min'         => 'Mínimo 4 caracteres',
            
            'img.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'        => 'Peso máximo de 5MB',
            'img.dimensions' => 'Las medidas son de 1920x1080',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $break      = Break1::find($id);
            $break->h1  = $request->h1;

            if ($request->hasFile('img')) {
                File::delete(public_path() . '/assets/images/descanso-1/' . $break->img);

                $image = $request->file('img');
                $name  = uniqid('break_', true) . '.' . $image->getClientOriginalExtension();
                $path  = public_path() . '/assets/images/descanso-1/';
                $image->move($path, $name);

                $break->img = $name;
            }

            $break->save();

            return redirect()->back();
        }
    }

    public function break2($id)
    {
        $break = Break2::find($id);
        return view('dashboard.home.break2')
                ->with('break', $break);
    }

    public function break2_update(Request $request, $id)
    {
        $rules = [
            'h1'  => 'required|min:4',
            'img' => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'h1.required'    => 'Este campo es necesario',
            'h1.min'         => 'Mínimo 4 caracteres',
            
            'img.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'        => 'Peso máximo de 5MB',
            'img.dimensions' => 'Las medidas son de 1920x1080',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $break      = Break2::find($id);
            $break->h1  = $request->h1;

            if ($request->hasFile('img')) {
                File::delete(public_path() . '/assets/images/descanso-2/' . $break->img);

                $image = $request->file('img');
                $name  = uniqid('break_', true) . '.' . $image->getClientOriginalExtension();
                $path  = public_path() . '/assets/images/descanso-2/';
                $image->move($path, $name);

                $break->img = $name;
            }

            $break->save();

            return redirect()->back();
        }
    }

    public function break3($id)
    {
        $break = Break3::find($id);
        return view('dashboard.home.break3')
                ->with('break', $break);
    }

    public function break3_update(Request $request, $id)
    {
        $rules = [
            'h1'  => 'required|min:4',
            'img' => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'h1.required'    => 'Este campo es necesario',
            'h1.min'         => 'Mínimo 4 caracteres',
            
            'img.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'        => 'Peso máximo de 5MB',
            'img.dimensions' => 'Las medidas son de 1920x1080',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $break      = Break3::find($id);
            $break->h1  = $request->h1;

            if ($request->hasFile('img')) {
                File::delete(public_path() . '/assets/images/descanso-3/' . $break->img);

                $image = $request->file('img');
                $name  = uniqid('break_', true) . '.' . $image->getClientOriginalExtension();
                $path  = public_path() . '/assets/images/descanso-3/';
                $image->move($path, $name);

                $break->img = $name;
            }

            $break->save();

            return redirect()->back();
        }
    }

    // Artículos
    public function articles()
    {
    	$articles = Article::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.articles.index')
    			->with('articles', $articles);
    }

    public function articles_create()
    {
    	return view('dashboard.articles.create');
    }

    public function articles_store(Request $request)
    {
    	$rules = [
            'title'   => 'required|min:4|unique:articles',
            'content' => 'required|min:4',
            'img'   => 'required|mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
			'title.required'   => 'Este campo es necesario',
			'title.min'        => 'Mínimo 4 caracteres',
			'title.unique'     => 'Ya existe este título, prueba otro',
			
			'content.required' => 'Este campo es necesario',
			'content.min'      => 'Mínimo 4 caracteres',
			
			'img.required'     => 'Este campo es necesario',
			'img.mimes'        => 'Sólo imágenes JPG, JPEG y PNG',
			'img.max'          => 'Peso máximo de 5MB',
			'img.dimensions'   => 'Las medidas son de 1920x1080',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $image = $request->file('img');
            $name  = uniqid('article_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/articulos/';
            $image->move($path, $name);

			$article          = new Article($request->all());
			$article->title   = $request->title;
			$article->slug    = str_slug($request->title);
			$article->content = html_entity_decode($request->content);
			$article->img     = $name;
			$article->user_id = Auth::user()->id;
            $article->save();

            return redirect('/escritorio/articulos');
        }
    }

    public function articles_edit($id)
    {
    	$article = Article::find($id);
    	return view('dashboard.articles.edit')
    			->with('article', $article);
    }

    public function articles_update(Request $request, $id)
    {
        $rules = [
            'title'   => 'required|min:4',
            'content' => 'required|min:4',
            'image'   => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
            'status'  => 'required',
        ];

        $messages = [            
            'title.required'   => 'Este campo es necesario',
            'title.min'        => 'Mínimo 4 caracteres',
            
            'content.required' => 'Este campo es necesario',
            'content.min'      => 'Mínimo 4 caracteres',

            'image.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'image.max'        => 'Peso máximo de 5MB',
            'image.dimensions' => 'Las medidas son de 1920x1080',
            
            'status.required'  => 'Este campo es necesario',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $article        = Article::find($id);
            $article->title = $request->title;
            $article->slug  = str_slug($request->title);

            if ($request->hasFile('image')) {
                File::delete(public_path() . '/assets/images/articulos/' . $article->image);

                $image = $request->file('image');
                $name  = uniqid('article_', true) . '.' . $image->getClientOriginalExtension();
                $path  = public_path() . '/assets/images/articulos/';
                $image->move($path, $name);

                $article->image = $name;
            }

            $article->content = html_entity_decode($request->content);
            $article->status  = $request->status;
            $article->save();

            return redirect('/escritorio/articulos');
        }
    }

    // Paquetes
    public function packs()
    {
    	$packs = Pack::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.packs.index')
    			->with('packs', $packs);
    }

    public function packs_create()
    {
    	return view('dashboard.packs.create');
    }

    public function packs_store(Request $request)
    {
    	$rules = [
			'title' => 'required|min:4|unique:packs',
			'img'   => 'required|mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1280,min_width=1280,min_height=720,max_height=720',
			'cover' => 'required|mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
			'title.required'   => 'Este campo es necesario',
			'title.min'        => 'Mínimo 4 caracteres',
			'title.unique'     => 'Ya existe este título, prueba otro',
			
			'img.required'     => 'Este campo es necesario',
			'img.mimes'        => 'Sólo imágenes JPG, JPEG y PNG',
			'img.max'          => 'Peso máximo de 5MB',
			'img.dimensions'   => 'Las medidas son de 1920x1080',
			
			'cover.required'   => 'Este campo es necesario',
			'cover.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
			'cover.max'        => 'Peso máximo de 2MB',
			'cover.dimensions' => 'Las medidas son de 1280x720',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $img_image = $request->file('img');
            $img_name  = uniqid('pack_', true) . '.' . $img_image->getClientOriginalExtension();
            $img_path  = public_path() . '/assets/images/paquetes/';
            $img_image->move($img_path, $img_name);

            $cover_image = $request->file('cover');
            $cover_name  = uniqid('cover_', true) . '.' . $cover_image->getClientOriginalExtension();
            $cover_path  = public_path() . '/assets/images/paquetes/';
            $cover_image->move($cover_path, $cover_name);

			$article          = new Pack($request->all());
			$article->title   = $request->title;
			$article->slug    = str_slug($request->title);
			$article->img     = $img_name;
			$article->cover   = $cover_name;
			$article->user_id = Auth::user()->id;
            $article->save();

            return redirect('/escritorio/paquetes');
        }
    }

    public function packs_edit($id)
    {
    	$pack = Pack::find($id);
    	return view('dashboard.packs.edit')
    			->with('pack', $pack);
    }

    public function packs_update(Request $request, $id)
    {
    	$rules = [
			'title'  => 'required|min:4',
			'img'    => 'mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1280,min_width=1280,min_height=720,max_height=720',
			'cover'  => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
			'status' => 'required'
        ];

        $messages = [            
			'title.required'   => 'Este campo es necesario',
			'title.min'        => 'Mínimo 4 caracteres',
			
			'img.mimes'        => 'Sólo imágenes JPG, JPEG y PNG',
			'img.max'          => 'Peso máximo de 5MB',
			'img.dimensions'   => 'Las medidas son de 1920x1080',
			
			'cover.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
			'cover.max'        => 'Peso máximo de 2MB',
			'cover.dimensions' => 'Las medidas son de 1280x720',

			'status.required'  => 'Este campo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
			$pack        = Pack::find($id);
			$pack->title = $request->title;
			$pack->slug  = str_slug($request->title);

			if ($request->hasFile('img')) {
                File::delete(public_path() . '/assets/images/paquetes/' . $pack->img);

				$img_image = $request->file('img');
				$img_name  = uniqid('pack_', true) . '.' . $img_image->getClientOriginalExtension();
				$img_path  = public_path() . '/assets/images/paquetes/';
				$img_image->move($img_path, $img_name);

				$pack->img = $img_name;
            }

            if ($request->hasFile('cover')) {
                File::delete(public_path() . '/assets/images/paquetes/' . $pack->cover);

				$cover_image = $request->file('cover');
				$cover_name  = uniqid('cover_', true) . '.' . $cover_image->getClientOriginalExtension();
				$cover_path  = public_path() . '/assets/images/paquetes/';
				$cover_image->move($cover_path, $cover_name);

				$pack->cover = $cover_name;
            }

            $pack->status = $request->status;
            $pack->save();

            return redirect('/escritorio/paquetes');
        }
    }

    // Paquetes | Servicios
    public function packs_services($id)
    {
		$pack         = Pack::find($id);
		$packservices = PackService::orderBy('id', 'DESC')->where('pack_id', $pack->id)->get();
    	return view('dashboard.packs.services.index')
    			->with('pack', $pack)
    			->with('packservices', $packservices);
    }

    public function packs_services_create($id)
    {
    	$pack = Pack::find($id);
    	return view('dashboard.packs.services.create')
    			->with('pack', $pack);
    }

    public function packs_services_store(Request $request)
    {
    	$rules = [
			'name'    => 'required|min:2',
			'pack_id' => 'required',
        ];

        $messages = [            
			'name.required'    => 'Este campo es necesario',
			'name.min'         => 'Mínimo 2 caracteres',
			
			'pack_id.required' => 'Este campo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
			$packservice          = new PackService($request->all());
			$packservice->name    = $request->name;
			$packservice->pack_id = $request->pack_id;
			$packservice->user_id = Auth::user()->id;
            $packservice->save();

            return redirect('/escritorio/paquetes/servicio/' . $packservice->pack->id);
        }
    }

    public function packs_services_edit($id)
    {
		$packservice = PackService::find($id);
		$packs       = Pack::all()->where('id', '!=', $packservice->pack->id);
    	return view('dashboard.packs.services.edit')
    			->with('packs', $packs)
    			->with('packservice', $packservice);
    }

    public function packs_services_update(Request $request, $id)
    {
    	$rules = [
			'name'    => 'required|min:2',
			'pack_id' => 'required',
        ];

        $messages = [            
			'name.required'    => 'Este campo es necesario',
			'name.min'         => 'Mínimo 2 caracteres',
			
			'pack_id.required' => 'Este campo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
			$packservice          = PackService::find($id);
			$packservice->name    = $request->name;
			$packservice->pack_id = $request->pack_id;
			$packservice->status  = $request->status;
            $packservice->save();

            return redirect('/escritorio/paquetes/servicio/' . $packservice->pack->id);
        }
    }

    // Requerimientos
    public function packs_requirements($id)
    {
		$service      = PackService::find($id);
		$requirements = PackRequirement::orderBy('id', 'DESC')->where('packservice_id', $service->id)->simplePaginate(10);
    	return view('dashboard.packs.requirements.index')
    			->with('requirements', $requirements)
    			->with('service', $service);
    }

    public function packs_requirements_create($id)
    {
        $service = PackService::find($id);
        return view('dashboard.packs.requirements.create')
                ->with('service', $service);
    }

    public function packs_requirements_store(Request $request)
    {
        $rules = [
            'name'           => 'required|min:2',
            'packservice_id' => 'required',
        ];

        $messages = [            
            'name.required'           => 'Este campo es necesario',
            'name.min'                => 'Mínimo 2 caracteres',
            
            'packservice_id.required' => 'Este campo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $packrequeriment                 = new PackRequirement($request->all());
            $packrequeriment->name           = $request->name;
            $packrequeriment->packservice_id = $request->packservice_id;
            $packrequeriment->user_id        = Auth::user()->id;
            $packrequeriment->save();

            return redirect('/escritorio/paquetes/requerimiento/' . $packrequeriment->packservice->id);
        }
    }

    public function packs_requirements_edit($id)
    {
        $requirement = PackRequirement::find($id);
        $services    = PackService::orderBy('id', 'DESC')
                            ->where('id', '!=', $requirement->packservice->id)
                            ->get();
        return view('dashboard.packs.requirements.edit')
                ->with('services', $services)
                ->with('requirement', $requirement);
    }

    public function packs_requirements_update(Request $request, $id)
    {
        $rules = [
            'name'           => 'required|min:2',
            'packservice_id' => 'required',
            'status'         => 'required',
        ];

        $messages = [            
            'name.required'           => 'Este campo es necesario',
            'name.min'                => 'Mínimo 2 caracteres',
            
            'packservice_id.required' => 'Este campo es necesario',

            'status.required'         => 'Este campo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $packrequeriment                 = PackRequirement::find($id);
            $packrequeriment->name           = $request->name;
            $packrequeriment->packservice_id = $request->packservice_id;
            $packrequeriment->status         = $request->status;
            $packrequeriment->save();

            return redirect('/escritorio/paquetes/requerimiento/' . $packrequeriment->packservice->id);
        }
    }

    // Servicios
    public function services()
    {
        $services = Service::orderBy('id', 'DESC')->simplePaginate(10);
        return view('dashboard.services.index')
                ->with('services', $services);
    }

    public function services_create()
    {
        return view('dashboard.services.create');
    }

    public function services_store(Request $request)
    {
        $rules = [
            'title'    => 'required|min:4|unique:services',
            'subtitle' => 'required|min:4',
            'img'      => 'required|mimes:png,svg|max:2000',
            'cover'    => 'required|mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'title.required'    => 'Este campo es necesario',
            'title.min'         => 'Mínimo 4 caracteres',
            'title.unique'      => 'Ya existe este título, prueba otro',
            
            'subtitle.required' => 'Este campo es necesario',
            'subtitle.min'      => 'Mínimo 4 caracteres',
            
            'img.required'      => 'Este campo es necesario',
            'img.mimes'         => 'Sólo imágenes PNG y SVG',
            'img.max'           => 'Peso máximo de 5MB',
            
            'cover.required'    => 'Este campo es necesario',
            'cover.mimes'       => 'Sólo imágenes JPG, JPEG y PNG',
            'cover.max'         => 'Peso máximo de 2MB',
            'cover.dimensions'  => 'Las medidas son de 1920x1080',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $img_image = $request->file('img');
            $img_name  = uniqid('service_', true) . '.' . $img_image->getClientOriginalExtension();
            $img_path  = public_path() . '/assets/images/servicios/';
            $img_image->move($img_path, $img_name);

            $cover_image = $request->file('cover');
            $cover_name  = uniqid('cover_', true) . '.' . $cover_image->getClientOriginalExtension();
            $cover_path  = public_path() . '/assets/images/servicios/';
            $cover_image->move($cover_path, $cover_name);

            $service           = new Service($request->all());
            $service->title    = $request->title;
            $service->slug     = str_slug($request->title);
            $service->subtitle = $request->subtitle;
            $service->img      = $img_name;
            $service->cover    = $cover_name;
            $service->user_id  = Auth::user()->id;
            $service->save();

            return redirect('/escritorio/servicios');
        }
    }

    public function services_edit($id)
    {
        $service = Service::find($id);
        return view('dashboard.services.edit')
                ->with('service', $service);
    }

    public function services_update(Request $request, $id)
    {
        $rules = [
            'title'    => 'required|min:4',
            'subtitle' => 'required|min:4',
            'img'      => 'mimes:jpg,png,jpeg,svg|max:2000',
            'cover'    => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
            'status'   => 'required'
        ];

        $messages = [            
            'title.required'    => 'Este campo es necesario',
            'title.min'         => 'Mínimo 4 caracteres',
            
            'subtitle.required' => 'Este campo es necesario',
            'subtitle.min'      => 'Mínimo 4 caracteres',
            
            'img.mimes'         => 'Sólo imágenes JPG, JPEG, PNG y SVG',
            'img.max'           => 'Peso máximo de 5MB',
            
            'cover.mimes'       => 'Sólo imágenes JPG, JPEG y PNG',
            'cover.max'         => 'Peso máximo de 2MB',
            'cover.dimensions'  => 'Las medidas son de 1280x720',
            
            'status.required'   => 'Este campo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $service           = Service::find($id);
            $service->title    = $request->title;
            $service->slug     = str_slug($request->title);
            $service->subtitle = $request->subtitle;

            if ($request->hasFile('img')) {
                File::delete(public_path() . '/assets/images/servicios/' . $service->img);

                $img_image = $request->file('img');
                $img_name  = uniqid('service_', true) . '.' . $img_image->getClientOriginalExtension();
                $img_path  = public_path() . '/assets/images/servicios/';
                $img_image->move($img_path, $img_name);

                $service->img = $img_name;
            }

            if ($request->hasFile('cover')) {
                File::delete(public_path() . '/assets/images/servicios/' . $service->cover);

                $cover_image = $request->file('cover');
                $cover_name  = uniqid('cover_', true) . '.' . $cover_image->getClientOriginalExtension();
                $cover_path  = public_path() . '/assets/images/servicios/';
                $cover_image->move($cover_path, $cover_name);

                $service->cover = $cover_name;
            }

            $service->status = $request->status;
            $service->save();

            return redirect('/escritorio/servicios');
        }
    }

    // Servicios | Servicios
    public function services_services($id)
    {
        $service         = Service::find($id);
        $serviceservices = ServiceService::orderBy('id', 'DESC')->where('service_id', $service->id)->get();
        return view('dashboard.services.services.index')
                ->with('service', $service)
                ->with('serviceservices', $serviceservices);
    }

    public function services_services_create($id)
    {
        $service = Service::find($id);
        return view('dashboard.services.services.create')
                ->with('service', $service);
    }

    public function services_services_store(Request $request)
    {
        $rules = [
            'name'       => 'required|min:2',
            'service_id' => 'required',
        ];

        $messages = [            
            'name.required'       => 'Este campo es necesario',
            'name.min'            => 'Mínimo 2 caracteres',
            
            'service_id.required' => 'Este campo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $serviceservice             = new ServiceService($request->all());
            $serviceservice->name       = $request->name;
            $serviceservice->service_id = $request->service_id;
            $serviceservice->user_id    = Auth::user()->id;
            $serviceservice->save();

            return redirect('/escritorio/servicios/servicio/' . $serviceservice->service->id);
        }
    }

    public function services_services_edit($id)
    {
        $serviceservice = ServiceService::find($id);
        $services       = Service::all()->where('id', '!=', $serviceservice->service->id);
        return view('dashboard.services.services.edit')
                ->with('services', $services)
                ->with('serviceservice', $serviceservice);
    }

    public function services_services_update(Request $request, $id)
    {
        $rules = [
            'name'       => 'required|min:2',
            'service_id' => 'required',
        ];

        $messages = [            
            'name.required'       => 'Este campo es necesario',
            'name.min'            => 'Mínimo 2 caracteres',
            
            'service_id.required' => 'Este campo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $serviceservice             = serviceService::find($id);
            $serviceservice->name       = $request->name;
            $serviceservice->service_id = $request->service_id;
            $serviceservice->status     = $request->status;
            $serviceservice->save();

            return redirect('/escritorio/servicios/servicio/' . $serviceservice->service->id);
        }
    }

    // Requerimientos
    public function services_requirements($id)
    {
        $service      = ServiceService::find($id);
        $requirements = ServiceRequirement::orderBy('id', 'DESC')->where('serviceservice_id', $service->id)->simplePaginate(10);
        return view('dashboard.services.requirements.index')
                ->with('requirements', $requirements)
                ->with('service', $service);
    }

    public function services_requirements_create($id)
    {
        $service = ServiceService::find($id);
        return view('dashboard.services.requirements.create')
                ->with('service', $service);
    }

    public function services_requirements_store(Request $request)
    {
        $rules = [
            'name'           => 'required|min:2',
            'serviceservice_id' => 'required',
        ];

        $messages = [            
            'name.required'           => 'Este campo es necesario',
            'name.min'                => 'Mínimo 2 caracteres',
            
            'serviceservice_id.required' => 'Este campo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $servicerequeriment                    = new ServiceRequirement($request->all());
            $servicerequeriment->name              = $request->name;
            $servicerequeriment->serviceservice_id = $request->serviceservice_id;
            $servicerequeriment->user_id           = Auth::user()->id;
            $servicerequeriment->save();

            return redirect('/escritorio/servicios/requerimiento/' . $servicerequeriment->serviceservice->id);
        }
    }

    public function services_requirements_edit($id)
    {
        $requirement = ServiceRequirement::find($id);
        $services    = ServiceService::orderBy('id', 'DESC')
                            ->where('id', '!=', $requirement->serviceservice->id)
                            ->get();
        return view('dashboard.services.requirements.edit')
                ->with('services', $services)
                ->with('requirement', $requirement);
    }

    public function services_requirements_update(Request $request, $id)
    {
        $rules = [
            'name'              => 'required|min:2',
            'serviceservice_id' => 'required',
            'status'            => 'required',
        ];

        $messages = [            
            'name.required'              => 'Este campo es necesario',
            'name.min'                   => 'Mínimo 2 caracteres',
            
            'serviceservice_id.required' => 'Este campo es necesario',
            
            'status.required'            => 'Este campo es necesario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $servicerequeriment                    = ServiceRequirement::find($id);
            $servicerequeriment->name              = $request->name;
            $servicerequeriment->serviceservice_id = $request->serviceservice_id;
            $servicerequeriment->status            = $request->status;
            $servicerequeriment->save();

            return redirect('/escritorio/servicios/requerimiento/' . $servicerequeriment->serviceservice->id);
        }
    }
}
