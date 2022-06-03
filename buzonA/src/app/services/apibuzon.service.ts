import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root',
})
export class ApibuzonService {
  private url = 'http://www.';

  constructor(private http: HttpClient) {}

  usuarioID(datos: any) {
    return this.http.post(`${this.url}/lista/usuarios-id`, datos);
  }

  registrarUsuario(datos: any) {
    return this.http.post(`${this.url}/registrar/usuario`, datos);
  }

  actualizarUsuario(datos: any) {
    return this.http.post(`${this.url}/editar/usuario`, datos);
  }

  eliminarUsuario(datos: any) {
    return this.http.post(`${this.url}/eliminar/usuario`, datos);
  }

  loginUsuario(datos: any) {
    return this.http.post(`${this.url}/login/usuarios`, datos);
  }
}
