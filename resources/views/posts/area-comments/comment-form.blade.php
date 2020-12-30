  <div class="comment-form">
        <form method="POST" id="registration" action="{{ action('CommentController@store') }}">
            @csrf
            <input type="hidden"  name="post_id" value="{{ $id }}" />
            <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name">
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="{{ __('Nombre') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('Nombre') }}'" value="{{ old('name') }}">
                </div>
                        
                <div class="form-group col-lg-6 col-md-6 email">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="{{ __('Ingresa tu Dirección Email') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('Ingresa tu Dirección Email') }}'"
                    value="{{ old('email') }}">
                </div>
                 @error('email')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                 @enderror										
            </div><!---->

            <div class="form-group">
                <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo_comment" placeholder="Título" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('Título') }}'" value="{{ old('titulo') }}">
            </div>
               @error('titulo')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <div class="form-group">
                <textarea class="form-control @error('message') is-invalid @enderror" rows="7" name="message" placeholder="{{ __('Mensaje') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('Mensaje') }}'" required=""></textarea>
            </div>
               @error('message')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <button type="submit" class="primary-btn submit_btn">{{ __('Enviar Comentario') }} </button>
        </form>
    </div>
@section('SingleScripts')
 @parent
    <script src="{{  url('js/comments/addComment.js') }}"></script>
@endsection