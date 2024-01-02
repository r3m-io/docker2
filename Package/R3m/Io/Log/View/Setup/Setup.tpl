{{R3M}}
{{$register = Package.R3m.Io.Log:Init:register()}}
{{if(!is.empty($register))}}
{{Package.R3m.Io.Log:Import:role.system()}}
{{Package.R3m.Io.Log:Import:log.handler()}}
{{Package.R3m.Io.Log:Import:log.processor()}}
{{Package.R3m.Io.Log:Import:log()}}
{{/if}}