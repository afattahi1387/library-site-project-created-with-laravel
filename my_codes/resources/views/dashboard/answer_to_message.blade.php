@extends('includes.dashboard_html_structure')
@section('title', 'پاسخ به پیام')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">پاسخ به پیام</h1><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus"></i>
                        پاسخ به پیام
                    </div>
                    <div class="card-body" style="direction: rtl;">
                        <form action="{{ route('set.answer.for.message', ['message' => $message->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <h2>مشخصات کاربر</h2>
                            <b>نام کاربر: </b><span>{{ $message->name }}</span>
                            <br>
                            <b>ایمیل کاربر: </b><span>{{ $message->email }}</span>
                            <br>
                            <h2>پیام ارسال شده</h2>
                            {!! $message->message !!}
                            <br><br>
                            <h2>پاسخ دادن</h2><br>
                            <textarea name="answer" id="answer" placeholder="پاسخ" class="form-control" rows="15"></textarea>
                            @if($errors->has('answer'))
                                <span class="text-danger">{{ $errors->first('answer') }}</span><br>
                            @endif
                            <br>
                            <input type="submit" value="پاسخ دادن" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <script>
      tinymce.init({
        selector: '#answer',
        'directionality': 'rtl',
        plugins: [

          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',

          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',

          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'

        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +

          'alignleft aligncenter alignright alignjustify | ' +

          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
      });
    </script>
@endsection
