@if ($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ html()->label('Имя', 'name')  }}
{{ html()->input('text', 'name')  }}
{{ html()->label('Содержания', 'body')  }}
{{ html()->textarea('body')  }}

