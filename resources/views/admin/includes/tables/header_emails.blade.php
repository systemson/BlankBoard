@forelse (Auth::user()->unreadEmails->slice(0,10)->all() as $resource)
  <li>
    <a href="{{ route('emails.show', $resource->id) }}">
      <div class="pull-left">
        <img class="img-circle" src="{{ URL::asset(\App\Models\User::find($resource->user_id)->image()) }}">
      </div>
      <h4>
        {{ str_limit($resource->subject, 20) }}
        <small><i class="fa fa-clock-o"></i> {{ $resource->created_at->diffForHumans() }}</small>
      </h4>
      <p>{{ str_limit($resource->body, 40) }}</p>
    </a>
  </li>
@empty
  <li>
    <a href="#">
      <p>{{ __('emails.table-empty') }}</p>
    </a>
  </li>
@endforelse
