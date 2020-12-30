
 @section('content')
  <div class="container">
    <myposts-component></myposts-component>
  </div>
 @endsection
@section('footerScripts')
 @parent
    <script src="{{ url('js/responses/dashboard/dashboard.js') }}"></script>
 @endsection