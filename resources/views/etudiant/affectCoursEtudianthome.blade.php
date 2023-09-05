@extends('master')
@section('content')
<section>
  <h3 style="margin-left:350px;margin-top:120px">AFFECTATION DE COURS AUX ÉTUDIANTS:</h3>
</section>

<div class="row g-2" style='margin-top:180px; position:absolute;  width:100%;   height:60%; padding:50px 15px; box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;border-radius:5px'> 
    <div class="col-md" style="width:100%;" >
      <div class="form-floating">
        <table class="tableau-gauche" style="width:100%;height:100%">
            <tr>
                <td>Id_aff</td>
                <td>Etudiant</td>
                <td>Cours</td>
                <td>Actions</td>
            </tr>
            <tr>
                <td>1</td>
                <td>LOKOSSOU Maurel</td>
                <td>Français</td>
                <td>
                    <button type="button" class="btn btn-danger">
                        <a href="" style="text-decoration: none; color:white;">Supprimer</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                    </button>
                </td> 
            </tr>
            <tr>
              <td>1</td>
              <td>LOKOSSOU Maurel</td>
              <td>Mathématiques</td>
              <td>
                  <button type="button" class="btn btn-danger">
                      <a href="" style="text-decoration: none; color:white;">Supprimer</a>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                      </svg>
                  </button>
              </td> 
            </tr>
            <tr>
              <td>1</td>
              <td>LOKOSSOU Maurel</td>
              <td>Mathématiques</td>
              <td>
                  <button type="button" class="btn btn-danger">
                      <a href="" style="text-decoration: none; color:white;">Supprimer</a>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                      </svg>
                  </button>
              </td> 
            </tr>
            <tr>
              <td>1</td>
              <td>LOKOSSOU Maurel</td>
              <td>Mathématiques</td>
              <td>
                  <button type="button" class="btn btn-danger">
                      <a href="" style="text-decoration: none; color:white;">Supprimer</a>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                          <polyline points="3 6 5 6 21 6"></polyline>
                          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                          <line x1="10" y1="11" x2="10" y2="17"></line>
                          <line x1="14" y1="11" x2="14" y2="17"></line>
                      </svg>
                  </button>
              </td> 
            </tr>
            
        </table>
      </div>
    </div>
    <div class="col-md" >
      <h4 style=""></h4>
      <div class="form-floating" >
          <form action="" method="POST" style="background:none; height:0; margin:0px; box-shadow:none; overflow:visible" enctype="multipart/form-data">
            @csrf
            <label for="" style="color: black;margin:15px 0px 5px 0px">Choisir un cours:</label>
              <select class="form-select"  style="width: 500px; height:50px;"  name="cours[]" multiple>
                      @foreach ($cours as $item)
                         <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
              </select>
              <label for="" style="color: black;margin:15px 0px 5px 0px; width:100%">Choisir un étudiant:</label>
              <select class="form-select"  style="width: 500px; height:50px;padding:10px "  name="etudiant[]" multiple >
                @foreach ($etudiant as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
              <button type="submit" class="btn btn-success " style="margin-left: 170px; margin-top:20px; width:200px">Enregistrer</button>
          </form>
      </div>
  </div>
  </div>
@endsection

