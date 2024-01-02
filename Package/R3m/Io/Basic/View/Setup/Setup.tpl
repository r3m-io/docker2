{{R3M}}
{{$register = Package.R3m.Io.Basic:Init:register()}}
{{if(!is.empty($register))}}
{{Package.R3m.Io.Basic:Import:role.system()}}
{{Package.R3m.Io.Basic:Configure:apache2()}}
{{Package.R3m.Io.Basic:Configure:openssl.init()}}
{{/if}}
{{Package.R3m.Io.Basic:Configure:apache2.restore()}}
{{Package.R3m.Io.Basic:Configure:apache2.backup()}}
{{Package.R3m.Io.Basic:Configure:apache2.restart()}}