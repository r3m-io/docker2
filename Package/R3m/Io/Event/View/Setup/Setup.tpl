{{R3M}}
{{$register = Package.R3m.Io.Event:Init:register()}}
{{if(!is.empty($register))}}
{{Package.R3m.Io.Event:Import:role.system()}}
{{Package.R3m.Io.Event:Import:event.action()}}
{{Package.R3m.Io.Event:Import:event()}}
Import System.Event
{{/if}}