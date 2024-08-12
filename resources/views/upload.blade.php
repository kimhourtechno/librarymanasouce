@extends('layouts.master')
@section('content')
<form action="{{ url('/upload/save') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h1>Upload File</h1>
    <hr>
    <p>
        File: <input type="file" name='photo[]' accept="image/*" onchange="preview(event)" multiple>
        {{-- accept="image/*"  select only extention image--}}

    </p>
    <div id="photos">

    </div>
    {{-- <p>
        <img src="" alt="" id='img' width="150">
    </p> --}}

    <p>
        <Button>Upload</Button>

    </p>
    @if (Session::has('error'))
        <p>
            {{ session('error') }}
        </p>

    @endif
    @if (Session::has('success'))
        <p>
            {{ session('success') }}
        </p>

    @endif
</form>
<script>



    function preview(evt) {
        let photos = evt.target.files;
          let img = "";
      for (let i = 0; i < photos.length; i++) {
         let src = URL.createObjectURL(evt.target.files[i]);
          img += "<img src='" + src + "' width='150'>";
        }
        document.getElementById('photos').innerHTML = img;
        }




    // function preview(evt) {
    //         //let img = document.getElementById('img');
    //         let photos = evt.target.files;
    //         let img = "";
    //         for(let i=0;i<photos.lenght; i++){
    //             let src = URL.createObjectURL(evt.target.files[i]);
    //             img += "<img src='" + src + "' width='150'>";
    //         }
    //         document.getElementById('photos').innerHTML = img;


    //         //img.src = URL.createObjectURL(evt.target.files[0]);

    // }

    // function preview(evt){

    //     let img = document.getElementById('img');
    //     img.src = URL.createObjectURL(evt.target.file[0]);

    // }
</script>
@endsection



