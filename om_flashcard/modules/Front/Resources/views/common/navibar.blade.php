<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{ trans('front::pagetitle.page_logo') }}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ OmUrlHelper::isSameUrlWithCurrentPage(['sentence'], 'active') }}">
                    {!!
                    Html::link("sentence",
                        trans('front::pagetitle.sentence.index')
                    )
                    !!}
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ \Auth::front()->user()->name }}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            {!!
                            Html::link("user/edit",
                                trans('front::pagetitle.user.edit')
                            )
                            !!}
                        </li>
                        <li>
                            {!!
                            Html::link("logout",
                                trans('front::pagetitle.auth.logout')
                            )
                            !!}
                        </li>

                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
