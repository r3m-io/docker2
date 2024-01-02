{{R3M}}
{{$register = Package.R3m.Io.Example:Init:register()}}
{{if(!is.empty($register))}}
{{Package.R3m.Io.Example:Import:role.system()}}
{{$options = options()}}
{{Package.R3m.Io.Example:Configure:site($options)}}
{{$host.create = Package.R3m.Io.Example:Configure:host.create($options)}}
{{$host.mapper.create = Package.R3m.Io.Example:Configure:host.mapper.create($options)}}
{{/if}}