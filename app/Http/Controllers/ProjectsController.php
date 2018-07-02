<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\User;
use App\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //importa autenticación

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*$projects = Project::all();*/
        if(Auth::check()){

            $projects = Project::where('user_id', Auth::user()->id)->get();
            return view('projects.index', ['projects' => $projects]); //asi es como pasamos valores a las vistas en laravel
        }

        return view('auth.login');
    }

    public function adduser(Request $request){
        //projects \users \project_user :id, user_id, project_id{}

        //take a project, add a user to itself
        $project = Project::find($request->input('project_id'));

        

        if(Auth::user()->id == $project->user_id){

            $user = User::where('email', $request->input('email'))->first();

            //revisa si el usuario ya esta agregado al proyecto 
            $projectUser = ProjectUser::where('user_id', $user->id)
                                        ->where('project_id', $project->id)
                                        ->first();

            if($projectUser){
                //si el usuario ya existe, sale
                return redirect()->route('projects.show', ['project' => $project->id])
                    ->with('success', $request->input('email'). ' Usuario ya es miembro de este proyecto.');
            }

            if($user && $project){

                $project->users()->attach($user->id); //toggle quita y coloca de nuevo attach agrega

                return redirect()->route('projects.show', ['project' => $project->id])
                    ->with('success', $request->input('email'). ' Ha sido agregado al proyecto de manera exitosa.');
            }
        }

        return redirect()->route('projects.show', ['project' => $project->id])
                    ->with('errors', 'Error agregando el usuario al proyecto.');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $company_id = null) //si esta vacio toma el null
    {
        $companies = null;
        if(!$company_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        
        return view('projects.create', ['company_id' => $company_id, 'companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //chequea si esta logeado en laravel
        if(Auth::check()){
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'company_id' => $request->input('company_id'),
                'user_id' => Auth::user()->id
            ]);

            if($project){
                return redirect()->route('projects.show', ['project'=> $project->id])
                ->with('success' , 'Proyecto creado con exito.');
            }
        }
        
        return back()->withInput()->with('errors', 'Error creando una nueva proyecto.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        $project = Project::find($project->id);

        $comments = $project->comments;
        return view('projects.show', ['project' => $project, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::find($project->id);

        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $projectUpdate = Project::where('id', $project->id)
                                    ->update([
                                        'name' => $request->input('name'),
                                        'description' => $request->input('description'),
                                    ]);

        if($projectUpdate){
            return redirect()
            ->route('projects.show', ['project' => $project->id])
            ->with('success', 'Proyecto actualizado');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        /*dd($project);*/

        $findProject = Project::find($project->id);
        if($findProject->delete()){
            return redirect()->route('projects.index')
            ->with('success', 'Proyecto eliminado exitosamente');
        }

        return back()->withInput()->with('error', 'El proyecto no pudo ser eliminado.');
    }
}
