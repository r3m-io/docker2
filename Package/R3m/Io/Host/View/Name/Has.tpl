{{R3M}}
{{$options = options()}}
{{$name.has = Package.R3m.Io.Host:Configure:name.has($options)}}
{{if(!is.empty($name.has))}}
true
{{else}}
false
{{/if}}