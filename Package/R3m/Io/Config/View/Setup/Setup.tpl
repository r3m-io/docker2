{{R3M}}
{{$register = Package.R3m.Io.Config:Init:register()}}
{{if(!is.empty($register))}}
{{Package.R3m.Io.Config:Import:role.system()}}
{{Package.R3m.Io.Config:Import:config.email()}}
{{Package.R3m.Io.Config:Import:config.framework()}}
{{Package.R3m.Io.Config:Import:config.ramdisk()}}
{{Package.R3m.Io.Config:Import:config.response()}}
{{Package.R3m.Io.Config:Import:config.service()}}
{{Package.R3m.Io.Config:Import:config()}}
{{Package.R3m.Io.Config:Import:event()}}
{{/if}}