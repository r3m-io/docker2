{{R3M}}
{{$options = options()}}
{{$site.has = Package.R3m.Io.Basic:Configure:apache2.site.has($options)}}
{{if(!is.empty($site.has))}}
true
{{else}}
false
{{/if}}