 <!-- Default Modals -->
 <div id="myModalPosition{{ $item['id'] }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Changer la position</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                 </button>
             </div>
             <div class="modal-body">

                 <form class="row g-3 needs-validation" method="post"
                     action="{{ route('blog-category.position', $item['id']) }}" novalidate>
                     @csrf

                     <div class="col-md-12">
                         <label for="validationCustom01" class="form-label">Position actuelle <span
                                 class="text-primary">{{ $item['position'] }} </span> </label>
                         <select name="position" class="form-control">
                             @for ($i = 1; $i <= count($data_blog_category); $i++)
                                 <option value="{{ $i }}" {{ $item['position'] == $i ? 'selected' : '' }}>
                                     {{ $i }}
                                 </option>
                             @endfor

                         </select>
                         <div class="valid-feedback">
                             Looks good!
                         </div>
                     </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                 <button type="submit" class="btn btn-primary ">Valider</button>
             </div>
             </form>
         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->

 {{-- @section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="{{ URL::asset('build/js/pages/modal.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection --}}
