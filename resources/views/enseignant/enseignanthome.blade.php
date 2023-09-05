@extends('master')
@section('content')
<section>
  <h3>LISTE DES ENSEIGNANTS:</h3>
</section>
<div class="button" style="margin-left:1065px">
  <button type="button" style="background:#2249f393;width:200px;" class="btn btn-primary"><a href="{{route('addenseignant')}}" style="text-decoration: none; color:white;">Ajouter un enseignant</a></button>
</div>
<table class="table table-striped" style=" margin-top:220px" >
  <thead>
    <tr>
      <th scope="col" style="background: #2249f393;color:white;padding:15px 0px 15px 45px">Nom:</th>
      <th scope="col" style="background:#2249f393;color:white;padding:15px 0px 15px 45px">Prénom:</th>
      <th scope="col" style="background: #2249f393;color:white;padding:15px 0px 15px 45px">Téléphone:</th>
      <th scope="col" style="background: #2249f393;color:white;padding:15px 0px 15px 45px">Adresse:</th>
      <th scope="col" style="background: #2249f393;color:white;padding:15px 0px 15px 45px">Action:</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($enseignants_list as $item)
          <tr>
            <td style="padding:15px 0px 10px 45px"> {{$item['firstname']}} </td>
            <td style="padding:15px 0px 10px 45px">{{$item['lastname']}} </td>
            <td style="padding:15px 0px 10px 45px">{{$item['telephone']}} </td>
            <td style="padding:15px 0px 10px 45px">{{$item['adresse']}} </td>   
            <td style="padding:15px 0px 10px 45px">
              <button type="button" class="btn btn-primary"><a href="" style="text-decoration: none; color:white;">Voir plus</a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
              <button type="button" class="btn btn-warning"><a href="" style="text-decoration: none; color:white;">Éditer</a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
              <button type="button" class="btn btn-danger"><a href="{{route('delete', ['id'=>$item['id']])}}" style="text-decoration: none; color:white;">Supprimer</a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
              <button type="button" style="background:#2249f393;width:200px;" class="btn btn-primary"><a href="{{route('affectationCours', ['id'=>$item['id']])}}" style="text-decoration: none; color:white;">Affecter un cours</a></button>
            </td>
          </tr>
        @endforeach
        <div style="position: absolute; margin-top:80px; background:none;">
          {{$enseignants_list->links()}}
        </div>
  </tbody>
</table>
@endsection
