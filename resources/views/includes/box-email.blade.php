<a class="btn btn-primary btn-block margin-bottom" href="{{ route('emails.create') }}" >Compose</a>
<div class="box box-solid">
  <div class="box-header with-border">
  <h3 class="box-title">Mailbox</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" type="button" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
      <li class="@if (routeNameIs('emails.index')) active @endif">
        <a href="{{ route('emails.index') }}" >
          <i class="fa fa-inbox"></i> {{ __('emails.title') }}
          @if (Auth::user()->unreadEmails()->count() > 0)
            <span class="label label-primary pull-right">
              {{ Auth::user()->unreadEmails()->count() }}
            </span>
          @endif
        </a>
      </li>

      <li class="@if (routeNameIs('emails.draft')) active @endif">
        <a href="{{ route('emails.draft') }}">
          <i class="fa fa-file-text"></i> {{ __('emails.draft') }}
          @if (Auth::user()->draftEmails()->count() > 0)
            <span class="label label-default pull-right">
              {{ Auth::user()->draftEmails()->count() }}
            </span>
          @endif
        </a>
      </li>

      <li class="@if (routeNameIs('emails.sent')) active @endif">
        <a href="{{ route('emails.sent') }}">
          <i class="fa fa-envelope"></i> {{ __('emails.sent') }}
        </a>
      </li>

      <li class="@if (routeNameIs('emails.trash')) active @endif">
        <a href="{{ route('emails.trash') }}">
          <i class="fa fa-trash"></i> {{ __('emails.trash') }}
        </a>
      </li>

    </ul>
  </div>
</div>
