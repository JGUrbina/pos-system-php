const profesores = [
    { id: 1, name: 'José Perez', grado: 'Doctorado' },
    { id: 2, name: 'Mario Mendoza', grado: 'Maestria' },
    { id: 3, name: 'Miguel Pardo', grado: 'Maestria' },
    { id: 4, name: 'Armando Paredes', grado: 'Doctorado' }
];
const alumnos = [
    { id: 1, name: 'Raúl Granado'},
    { id: 2, name: 'Juan Dinamo'},
    { id: 3, name: 'Mercedes Arango'},
    { id: 4, name: 'Aaron Alvarodo ' }
];
const cursos = [
    { id: 1, name: 'Calculo', creditos: 3 },
    { id: 2, name: 'Diseño', creditos: 2 },
    { id: 3, name: 'Desarrollo', creditos: 4 },
    { id: 4, name: 'Analisis', creditos: 4 },
    { id: 5, name: 'Estadistica', creditos: 2 }
]
const matricula = [
    { alumnoId: 1, cursoId: 1, profesorId: 1, year: 2022 },
    { alumnoId: 3, cursoId: 4, profesorId: 2, year: 2021 },
    { alumnoId: 3, cursoId: 2, profesorId: 3, year: 2021 },
    { alumnoId: 1, cursoId: 2, profesorId: 3, year: 2022 },
    { alumnoId: 2, cursoId: 3, profesorId: 4, year: 2022 },
    { alumnoId: 4, cursoId: 1, profesorId: 1, year: 2021 },
    { alumnoId: 4, cursoId: 3, profesorId: 4, year: 2021 },
    { alumnoId: 4, cursoId: 5, profesorId: 1, year: 2021 },
];

let indexar_alumnos = alumnos.reduce((acc, prev) => ({
    ...acc,
    [prev.id]: prev.name
}), {});

let indexar_cursos = cursos.reduce((acc, prev) => ({
    ...acc,
    [prev.id]: prev.creditos
}), {});

let dicAux = {};
let dic = {};
let filtrar = 4;



 for (let m of matricula) {
     if (dicAux[indexar_alumnos[m.alumnoId]]) {
         dicAux[indexar_alumnos[m.alumnoId]] += indexar_cursos[m.cursoId];
     } else {
          dicAux[indexar_alumnos[m.alumnoId]] = indexar_cursos[m.cursoId];
     }
    
     if (dicAux[indexar_alumnos[m.alumnoId]] > filtrar) {
         dic[indexar_alumnos[m.alumnoId]] = dicAux[indexar_alumnos[m.alumnoId]];
     }
 }


 
const Articulos = [
    { id: 1, name: 'Articulo 1' },
    { id: 2, name: 'Articulo 2' },
    { id: 3, name: 'Articulo 3' },
    { id: 4, name: 'Articulo 4' },
    { id: 5, name: 'Articulo 5' },
    { id: 6, name: 'Articulo 6' },
    { id: 7, name: 'Articulo 7' },
    { id: 8, name: 'Articulo 8' },
    { id: 9, name: 'Articulo 9' },
    { id: 10, name: 'Articulo 10' },
    { id: 11, name: 'Articulo 11' },
    { id: 12, name: 'Articulo 12' },
    { id: 13, name: 'Articulo 13' },
];
const ofertas = [
    { id: 1, name: 'Oferta 1'},
    { id: 2, name: 'Oferta 2'},
    { id: 3, name: 'Oferta 3'}
];

// Ya que siempre habrá más productos que ofertas podemos hacerlo solo con un reduce
const ofert = 4;
//Para evitar modificar el array principal
const copy_ofertas = [...ofertas];
const articulos_ofertas = Articulos.reduce((acc, prev, index) => {

    //Evaluamos la cantidad que queremos que entre una oferta
    if (index !== 0 && index % ofert === 0) {
         //sacamos la primera oferta que tengamos en el array, (hacemos una copia para no afectar arreglo principal)
        let oferta = copy_ofertas.shift();
        //Mientras exista una oferta entramos acá
         if (!!oferta) {

             return [
                ...acc,
                oferta,
                prev
             ]
             
         }
        
    }
    //acá agregamos todos los demás articulos
    return [
            ...acc,
            prev
        ]

}, [])

console.log(articulos_ofertas)

https://questionnaire.evalart.com/cuestionario/info/430/norm/de3cceb62e4f3af875e31f84b60df255/szRlV3zgn_SLASH_I7Khjzs57opXKKf1FNMyiRgrSL78KWfF0_EQUALS_