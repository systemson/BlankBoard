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
      <li class="@if (routeNameIs('emails.index')) active @endif"><a href="{{ route('emails.index') }}" ><i class="fa fa-inbox"></i> Inbox<span class="label label-primary pull-right">{{ Auth::user()->emails()->count() }}</span></a></li>
      <li><a href="#" ><i class="fa fa-envelope"></i> Sent</a></li>
      <li><a href="#" ><i class="fa fa-file-text"></i> Drafts<span class="label label-default pull-right">{{ Auth::user()->draftEmails()->count() }}</span></a></li>
      <li><a href="#" ><i class="fa fa-trash"></i> Trash</a></li>
    </ul>
  </div>
</div>
