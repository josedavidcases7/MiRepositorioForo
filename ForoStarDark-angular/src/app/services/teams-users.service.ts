import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { GenericoService } from './generico.service';


export interface DatosInsertarUsuarioEquipo {
  theme: string;
  user_name: string;
  team_name: string;
}

@Injectable({
  providedIn: 'root'
})
export class TeamsUsersService {
  private endpoint = 'users-teams';

  constructor(private api: GenericoService) {}

  asignarUsuarioEquipo(data: DatosInsertarUsuarioEquipo): Observable<any> {
    return this.api.crear(this.endpoint, data);

  }


}
