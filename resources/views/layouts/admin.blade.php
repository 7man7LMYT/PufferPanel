<!DOCTYPE html>
<html lang="en">
<head>
    @section('scripts')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/pufferpanel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/admin.min.js') }}"></script>
    @show
    <title>PufferPanel - @yield('title')</title>
</head>
<body>
    <div class="container">
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">PufferPanel - Laravel</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                @section('right-nav')
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('strings.language') }}<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/language/de">Deutsch</a></li>
                                <li><a href="/language/en">English</a></li>
                                <li><a href="/language/es">Espa&ntilde;ol</a></li>
                                <li><a href="/language/fr">Fran&ccedil;ais</a></li>
                                <li><a href="/language/it">Italiano</a></li>
                                <li><a href="/language/pl">Polski</a></li>
                                <li><a href="/language/pt">Portugu&ecirc;s</a></li>
                                <li><a href="/language/ru">&#1088;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;</a></li>
                                <li><a href="/language/se">Svenska</a></li>
                                <li><a href="/language/zh">&#20013;&#22269;&#30340;的</a></li>
                            </ul>
                        </li>
                        <li class="hidden-xs"><a href="/"><i class="fa fa-server"></i></a></li>
                        <li class="hidden-xs"><a href="/auth/logout"><i class="fa fa-power-off"></i></a></li>

                    </ul>
                @show
            </div>
        </div>
        <!-- Add Back Mobile Support -->
        <div class="row">
            <div class="col-md-3 hidden-xs hidden-sm" id="sidebar_links">
                @section('sidebar')
                    <div class="list-group">
                        <a href="/admin" id="sidenav_admin-index" class="list-group-item">Admin Index</a>
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-heading"><strong>Settings</strong></a>
                        <a href="/admin/settings/global" class="list-group-item">Global Settings</a>
                        <a href="/admin/settings/urls" class="list-group-item">URL Settings</a>
                        <a href="/admin/settings/email" class="list-group-item">Email Settings</a>
                        <a href="/admin/settings/captcha" class="list-group-item">Captcha Settings</a>
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-heading"><strong>Account Management</strong></a>
                        <a href="/admin/accounts" class="list-group-item">Find Account</a>
                        <a href="/admin/accounts/new" class="list-group-item">New Account</a>
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-heading"><strong>Server Management</strong></a>
                        <a href="/admin/servers" class="list-group-item">Find Server</a>
                        <a href="/admin/servers/new" class="list-group-item">New Server</a>
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-heading"><strong>Node Management</strong></a>
                        <a href="/admin/node" class="list-group-item">List Nodes</a>
                        <a href="/admin/node/new" class="list-group-item">Add Node</a>
                        <a href="/admin/node/locations" class="list-group-item">Manage Locations</a>
                        <a href="/admin/node/plugins" class="list-group-item">Manage Plugins</a>
                    </div>
                @show
            </div>
            @yield('content')
        </div>
        <div class="footer">
            <div class="row">
                <div class="col-md-12">
                    Copyright &copy; 2012 - {{ date('Y') }} <a href="https://github.com/PufferPanel/PufferPanel" target="_blank">PufferPanel Development</a>.<br />
                    PufferPanel is licensed under a <a href="http://www.gnu.org/licenses/gpl-3.0.en.html" target="_blank">GPLv3</a> license. <!-- Please do not remove this license notice. -->
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function () {
        // Remeber Active Tab and Navigate to it on Reload
        for(var queryParameters={},queryString=location.search.substring(1),re=/([^&=]+)=([^&]*)/g,m;m=re.exec(queryString);)queryParameters[decodeURIComponent(m[1])]=decodeURIComponent(m[2]);$("a[data-toggle='tab']").click(function(){queryParameters.tab=$(this).attr("href").substring(1),window.history.pushState(null,null,location.pathname+"?"+$.param(queryParameters))});
        if($.urlParam('tab') != null){$('.nav.nav-tabs a[href="#' + $.urlParam('tab') + '"]').tab('show');}
    });
    </script>
</body>
</html>
