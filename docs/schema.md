# Database Schema

The full DDL lives in [`database/schema.sql`](https://github.com/aliammari1/WeDrive-Carpooling-app/blob/main/database/schema.sql).
It was reconstructed from the data-access code (the repo historically shipped no
schema dump) and consolidated onto a single `wedrive` database.

```mermaid
erDiagram
    users ||--o| admins : "is-a"
    users ||--o| passagers : "is-a"
    users ||--o| conducteurs : "is-a"
    users ||--o{ trajets : "drives"
    users ||--o{ reclamation : "files"
    users ||--o{ avis : "writes"
    classification ||--o{ reclamation : "categorizes"
    reservation ||--o{ paiement : "paid by"
    avis ||--o{ reponse : "answered by"

    users {
        int id_user PK
        string email UK
        string password "bcrypt"
        enum role "admin|conducteur|passager"
    }
    trajets {
        int idtrajet PK
        int idConducteur FK
        string lien_depar_arriver "origin|dest as lat,lng"
        decimal tarif
        datetime Date_D
    }
    reservation {
        int id_reserv PK
        int nb_place_vide
        string mode_paiement
        datetime date_meet
    }
    paiement {
        int id_p PK
        int id_reserv FK
        decimal prix
    }
    reclamation {
        int id_rec PK
        int id_user FK
        int id_type FK
    }
    classification {
        int id_type PK
        string nom
    }
    avis {
        int id PK
        int id_user FK
        int note
    }
```

## Tables

| Table | Purpose |
|---|---|
| `users` | accounts; `role` discriminates admin / conducteur / passager |
| `admins`, `passagers`, `conducteurs` | role-specific 1:1 extensions of `users` |
| `trajets` | published rides (origin/destination, price, date) |
| `address` | reusable departure/arrival address pairs |
| `reservation` | seat reservations |
| `paiement` | payments against a reservation |
| `reclamation` | support tickets |
| `classification` | reclamation categories / response templates |
| `avis` | reviews/ratings |
| `commentaires`, `reponse` | comments and replies |
