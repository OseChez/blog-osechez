  <div class="comment-form">
<form method="POST" id="registration" action="/upload" enctype="multipart/form-data">
       @csrf
     <div class="form-group form-inline">
        <div class="form-group col-lg-6 col-md-6 name">
          <input type="text" id="type-img" name="type" class="form-control @error('type') is-invalid @enderror"  placeholder="{{ __('Asignar Imagen a') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('Asignar imagen a:') }}'" value="{{ old('type') }}">
        </div>
                        
       <div class="form-group col-lg-6 col-md-6 email">
         <input type="number" name="post_id" class="form-control @error('post_id') is-invalid @enderror" id="type-img" placeholder="{{ __('ID del Post') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('Ingresa tu Dirección Email') }}'"
                    value="{{ old('post_id') }}">
      </div>
                 @error('post_id')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                 @enderror                    
    </div><!---->

    <div class="form-group">
      <input type="text" name="url_img" class="form-control @error('url_img') is-invalid @enderror" id="url_img" placeholder="Url de Imagen" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('Url de Imagen') }}'" value="{{ old('url_img') }}">
    </div>
               @error('url-img')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                @enderror
    <div class="row">
       <div class="col-md-10">
         <div class="form-group">
             <label for="image">Escoge una Imagen</label>
             <input type="file" id="image" name="image">
          </div>
               @error('message')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                @enderror
       </div>
    </div>
      <div class="form-group">
        <button type="submit" class="btn btn-md btn-success pull-right">Upload</button>
      </div>
 </form>