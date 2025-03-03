const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"tasks.create":{"uri":"create-task","methods":["GET","HEAD"]},"tasks.store":{"uri":"create-task","methods":["POST"]},"clientes.index":{"uri":"clientes","methods":["GET","HEAD"]},"clientes.create":{"uri":"clientes\/create","methods":["GET","HEAD"]},"clientes.store":{"uri":"clientes","methods":["POST"]},"clientes.show":{"uri":"clientes\/{cliente}","methods":["GET","HEAD"],"parameters":["cliente"]},"clientes.edit":{"uri":"clientes\/{cliente}\/edit","methods":["GET","HEAD"],"parameters":["cliente"]},"clientes.update":{"uri":"clientes\/{cliente}","methods":["PUT","PATCH"],"parameters":["cliente"]},"clientes.destroy":{"uri":"clientes\/{cliente}","methods":["DELETE"],"parameters":["cliente"]},"users.index":{"uri":"users","methods":["GET","HEAD"]},"users.create":{"uri":"users\/create","methods":["GET","HEAD"]},"users.store":{"uri":"users","methods":["POST"]},"users.show":{"uri":"users\/{user}","methods":["GET","HEAD"],"parameters":["user"]},"users.edit":{"uri":"users\/{user}\/edit","methods":["GET","HEAD"],"parameters":["user"]},"users.update":{"uri":"users\/{user}","methods":["PUT","PATCH"],"parameters":["user"]},"users.destroy":{"uri":"users\/{user}","methods":["DELETE"],"parameters":["user"]},"cuotas.index":{"uri":"cuotas","methods":["GET","HEAD"]},"cuotas.create":{"uri":"cuotas\/create","methods":["GET","HEAD"]},"cuotas.store":{"uri":"cuotas","methods":["POST"]},"cuotas.show":{"uri":"cuotas\/{cuota}","methods":["GET","HEAD"],"parameters":["cuota"]},"cuotas.edit":{"uri":"cuotas\/{cuota}\/edit","methods":["GET","HEAD"],"parameters":["cuota"]},"cuotas.update":{"uri":"cuotas\/{cuota}","methods":["PUT","PATCH"],"parameters":["cuota"]},"cuotas.destroy":{"uri":"cuotas\/{cuota}","methods":["DELETE"],"parameters":["cuota"]},"clientes.cuotas":{"uri":"clientes\/{id}\/cuotas","methods":["GET","HEAD"],"parameters":["id"]},"tareas.cancel":{"uri":"tareas\/{id}\/cancel","methods":["POST"],"parameters":["id"]},"tareas.realize":{"uri":"tareas\/{id}\/realize","methods":["POST"],"parameters":["id"]},"users.degrade":{"uri":"users\/{id}\/degrade","methods":["POST"],"parameters":["id"]},"users.promote":{"uri":"users\/{id}\/promote","methods":["POST"],"parameters":["id"]},"cuotas.markAsPaid":{"uri":"cuotas\/{id}\/markAsPaid","methods":["POST"],"parameters":["id"]},"tareas.index":{"uri":"tareas","methods":["GET","HEAD"]},"tareas.create":{"uri":"tareas\/create","methods":["GET","HEAD"]},"tareas.store":{"uri":"tareas","methods":["POST"]},"tareas.show":{"uri":"tareas\/{tarea}","methods":["GET","HEAD"],"parameters":["tarea"]},"tareas.edit":{"uri":"tareas\/{tarea}\/edit","methods":["GET","HEAD"],"parameters":["tarea"]},"tareas.update":{"uri":"tareas\/{tarea}","methods":["PUT","PATCH"],"parameters":["tarea"]},"tareas.destroy":{"uri":"tareas\/{tarea}","methods":["DELETE"],"parameters":["tarea"]},"tareas.user":{"uri":"tareas\/{id}\/user","methods":["GET","HEAD"],"parameters":["id"]},"tareas.clientes":{"uri":"tareas\/{id}\/client","methods":["GET","HEAD"],"parameters":["id"]},"profile.edit":{"uri":"profile","methods":["GET","HEAD"]},"profile.update":{"uri":"profile","methods":["PATCH"]},"profile.destroy":{"uri":"profile","methods":["DELETE"]},"register":{"uri":"register","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"],"parameters":["token"]},"password.store":{"uri":"reset-password","methods":["POST"]},"verification.notice":{"uri":"verify-email","methods":["GET","HEAD"]},"verification.verify":{"uri":"verify-email\/{id}\/{hash}","methods":["GET","HEAD"],"parameters":["id","hash"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"password.confirm":{"uri":"confirm-password","methods":["GET","HEAD"]},"password.update":{"uri":"password","methods":["PUT"]},"logout":{"uri":"logout","methods":["POST"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
