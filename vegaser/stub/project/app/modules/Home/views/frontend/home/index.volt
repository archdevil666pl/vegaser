<div class="inner cover">
    <h1 class="cover-heading">Vegas Startup Project.</h1>
    <p class="lead">Vegas CMF is a complex Content Management Framework that allows you to easily build own CMS.</p>
    <p class="lead">
        <a href="https://vegas-cmf.github.io" class="btn btn-lg btn-default">Learn more</a>
    </p>

    {% if identity is defined %}
    <p>
        Logged in as {{ identity.getEmail() }} | <a href="{{ url.get(['for' : 'logout']) }}">Logout</a>
    </p>
    {% endif %}
</div>