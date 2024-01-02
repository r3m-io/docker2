{{R3M}}
{{$register = Package.R3m.Io.Autoload:Init:register()}}
{{if(!is.empty($register))}}
{{Package.R3m.Io.Autoload:Import:role.system()}}
{{Package.R3m.Io.Autoload:Import:autoload()}}
{{Package.R3m.Io.Autoload:Import:autoload.prefix()}}
{{Package.R3m.Io.Autoload:Import:config.autoload()}}
{{/if}}