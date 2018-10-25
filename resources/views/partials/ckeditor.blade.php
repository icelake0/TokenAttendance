<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <!-- /.box-header -->
        <div class="box-body pad">
                <textarea id="editor1" name="{{$ckname}}" rows="10" cols="80">{{$ckplaceholder}}
                </textarea>
        </div>
      </div>
    </div>
    <!-- /.col-->
  </div>
  <!-- ./row -->
</section>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- CK Editor -->
<script src="/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>