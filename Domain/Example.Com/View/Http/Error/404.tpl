{{R3M}}
<html>
<head>
    <title>HTTP/1.0 404 Not Found: {{$file}}</title>
    <style>
        body, html, section {
            margin: 0;
            padding: 0;
        }
        section[name="header"] {
            background: rgba(200, 0, 0, 1);
            width: 100%;
        }
        section[name="header"] h3 {
            display: inline-block;
            padding: 0;
            margin: 10px;
            color: rgba(255, 255, 255, 1);
        }
        section[name="message"] {
            background: rgba(225, 225, 225, 1);
            width: 100%;
        }
        section[name="message"] h3 {
            display: inline-block;
            padding: 0;
            margin: 10px;
            color: rgba(0, 0, 0, 1);
        }
        label {
            font-weight: bold;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<section name="header">
    <h3>HTTP/1.0 404 Not Found</h3>
</section><section name="message">
    <label>File: </label>
    <span>{{$file}}</span><br>
    <label>Extension: </label>
    <span>{{$extension}}</span><br>
    {{if(!is.empty($contentType))}}
    <label>ContentType: </label>
    <span>{{$contentType}}</span><br>
    {{else}}
    <label>Error: </label>
    <span>Illegal contentType...</span><br>
    {{/if}}
</section>
</body>
</html>