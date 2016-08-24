{% extends "masterPage.php" %}

{% block title %}Post{% endblock %}
{% block head %}
    {{ parent() }}
    <style type="text/css">
        .important { color: #336699; }
    </style>
{% endblock %}
{% block content %}
    <h1>Post</h1>
    <p class="important">
        Bienvenido al post {{name}}
    </p>
{% endblock %}
