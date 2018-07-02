<div class='container'>
	@foreach($comments as $comment)
		 <div class="media comment-box">
            <div class="media-left">

                {{-- <a href="#">
                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                </a> --}}
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->name }}</h4>
                <p>{{ $comment->body }}
				
                <strong><em><a href="#">{{ $comment->url }}</a></em></strong>
              	
              	<small>Fecha {{ $comment->created_at }}</small></p>
            </div>
        </div>
    @endforeach
</div>