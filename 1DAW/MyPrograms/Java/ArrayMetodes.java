package Actividades;

import java.util.Random;
import java.util.Scanner;
/**
 * Metodos de Arrays
 * 
 * Ordenacion e implementacion de investigadores de arrays
 * 
 * @author: Juan Molés
 * version 1.0
 * since 31/01/2023
 */

public class ArraysMetodes {
	// Membres de la classe
	private final static int TAM = 10;
	private static Scanner scanner = new Scanner(System.in);
	private int totalSecuencial, totalBinario; 
	private static int  [] arrayEnters;
	private static char [] arrayCaracters;
	private static String [] arrayString = {"Salir", "Mostra array enters", "Mostrar array caracters",
			"Reinicializar vectores", "Investigación secuencial", "Investigación binaria", 
			"Compara eficiencia de los investigadores", "Ordenar con Seleccion", "Ordenar por insercion", 
			"Ordenar con burbuja", "Ordenar con Quicksort", "Ordenar con Shell" 
	};	
	// Constructor de la classe
	public TAD () {
		arrayEnters    = new int  [TAM];
		arrayCaracters = new char [TAM];
		rellenarArraysEnters();
		rellenarArraysCaracters();
	}

	public static void main (String [] args) {
		ArraysMetodes test = new ArraysMetodes();
		test.eleccionMenu();
	}


	/**
	 * Cases
	 * 
	 * Metodo que al recibir un valor otorgado por el usuario ejecuta el caso correspondiente al valor. 
	 * 
	 * @param opcion	valor que indica que caso se va a ejecutar
	 */
	public void Cases(int opcion) {
		switch (opcion) {

		case 1:
			System.out.println("Finalizando ejecucion...");
			break;
		case 2:
			System.out.println(" ");
			System.out.println("+--------------------+");
			System.out.println("| Mostrar " + TAM + " Enteros |");
			System.out.println("+--------------------+");
			mostraEnters();

			int condicion = condicionMenu();
			if (condicion == 1)
				eleccionMenu();

			break;

		case 3:
			System.out.println(" ");
			System.out.println("+-----------------------+");
			System.out.println("| Mostrar " + TAM + " Caracteres |");
			System.out.println("+-----------------------+");
			mostraCaracters();

			condicion = condicionMenu();
			if (condicion == 1)
				eleccionMenu();
			break;

		case 4:
			rellenarArraysEnters();
			rellenarArraysCaracters();
			System.out.println("Vectores reinicializados");
			condicion = condicionMenu();
			if (condicion == 1)
				eleccionMenu();
			break;

		case 5:
			System.out.println("+--------------------------+");
			System.out.println("| Investigacion secuencial |");
			System.out.println("+--------------------------+");
			System.out.println("Ingrese un numero entero:");
			int num = scanner.nextInt();
			int valorRetornado = secuencial(num, arrayEnters);

			if(valorRetornado == -1)
				System.out.print("Numero no encontrado");
			else
				System.out.println("Numero encontrado en la posicion: " + (valorRetornado+1));

			mostrarnumDisponibles();

			condicion = condicionMenu();
			if (condicion == 1)	
				eleccionMenu();
			break;

		case 6:
			System.out.println("+-----------------------+");
			System.out.println("| Investigacion binaria |");
			System.out.println("+-----------------------+");
			System.out.println("Ingrese un numero entero:");
			num = scanner.nextInt();
			valorRetornado = binario(num);

			if (valorRetornado == -1)
				System.out.println("Numero no encontrado");
			else
				System.out.println("Numero encontrado en la posicion: " + (valorRetornado+1));

			mostrarnumDisponibles();

			condicion = condicionMenu();
			if (condicion == 1)	
				eleccionMenu();
			break;

		case 7:    	
			System.out.println("+-------------------------+");
			System.out.println("|  Comparando eficiencia  |");
			System.out.println("+-------------------------+");
			comparaEficiencias();

			condicion = condicionMenu();
			if (condicion == 1)
				eleccionMenu();
			break;

		case 8:
			System.out.println("+----------------------------+");
			System.out.println("|  Ordenacion por Seleccion  |");
			System.out.println("+----------------------------+");
			seleccion();
			mostraEnters();

			condicion = condicionMenu();
			if (condicion == 1)
				eleccionMenu();
			break;

		case 9:
			System.out.println("+----------------------------+");
			System.out.println("|  Ordenacion por insercion  |");
			System.out.println("+----------------------------+");
			insercion();
			mostraEnters();

			condicion = condicionMenu();
			if (condicion ==1)
				eleccionMenu();
			break;

		case 10:
			System.out.println("+--------------------------+");
			System.out.println("|  Ordenacion por burbuja  |");
			System.out.println("+--------------------------+");
			burbuja();
			mostraEnters();

			condicion = condicionMenu();
			if (condicion == 1)
				eleccionMenu();
			break;

		case 11:
			System.out.println("+--------------------------+");
			System.out.println("| Ordenacion por Quicksort |");
			System.out.println("+--------------------------+");
			int primero = 0;
			int ultimo = TAM-1;
			quicksort(primero, ultimo);
			mostraEnters();

			condicion = condicionMenu();
			if (condicion == 1)
				eleccionMenu();
			break;

		case 12:
			System.out.println("+------------------------+");
			System.out.println("|  Ordenacion por Shell  |");
			System.out.println("+------------------------+");
			shell();
			mostraEnters();

			condicion = condicionMenu();
			if (condicion == 1)
				eleccionMenu();
			break;
		default:
			System.out.println("Opcion no disponible, por favor elija otra opcion");
			int numMenu = scanner.nextInt();
			Cases(numMenu);
		}
	}

	/**
	 * mostraMenu
	 * 
	 * Metodo encargado de imprimir en la consola las opciones que ejecutara el metodo Cases.
	 */
	public void mostraMenu() {	
		System.out.println("");
		System.out.println("+-----------------------------------------+");
		System.out.println("|  Opciones para ejecutar:");
		for (int i = 0; i < arrayString.length; i++){	//Bucle que imprime todo el arrayString
			System.out.println("| " + (i+1) + ". " + arrayString[i]);
		}
		System.out.println("+-----------------------------------------+");
		System.out.println("Que opcion desea ejecutar?");
	}

	/**
	 * mostraEnters
	 * 
	 * Funcion que muestra 10 numeros enteros aleatorios a traves de un for, que se encarga de pasar por todas las posiciones
	 * de los arrays e imprimiendo cada una de estas en la consola. Cabe recalcar que los valores de los arrays son rellenados en el case.
	 */
	public void mostraEnters() {
		System.out.println("Sus numeros son:");
		for (int i = 0; i < TAM; i++) {
			System.out.println("posición " + (i+1) + ": " + arrayEnters[i]);
		}
	}    

	/**
	 * mostraCaracters
	 * 
	 * Funcion que muestra 10 caracteres aleatorios a traves de un for, que se encarga de pasar por todas las posiciones
	 * de los arrays e imprimiendo cada una de estas en la consola. Cabe recalcar que los valores de los arrays son rellenados en el case.
	 */
	public void mostraCaracters() {

		System.out.println(" ");
		System.out.println("Sus Caracteres son: ");
		for (int i = 0; i < TAM; i++) {
			System.out.println("posición " + (i+1) + ": " + arrayCaracters[i]);
		}
	}


	/**
	 * Secuencial
	 * 
	 * Metodo tambien conocido como investigador lineal, el cual tiene un for que recorre todas las posiciones del arrayEnter,
	 * obteniendo en caso de que la clave sea igual a la posicion un return de la posicion, siendo usado en el case 
	 * para saber si la variable fue encontrada o no.
	 * 
	 * @param clau	numero asigando por el usuario el cual se va a buscar en el metodo
	 * @return
	 */
	int secuencial (int clau, int [] array) { 
		for (int i = 0; i < TAM; i ++ ) 

			if (array[i] == clau )
				return i;

		return -1;
	}

	//Investigador binario de arrays
	/**
	 * Binario
	 * 
	 * Antes de empezar la explicacion es necesario entender que para que el metodo funcione los valores del arrayd eben de estar ordenados
	 * cosa que fue realizada con otro metodo
	 * 
	 * Metodo que se encarga de buscar un numero asignado por el usuario a traves de una busqueda binaria, es decir, lo primero que
	 * hace es establecerse en el centro de array, sumando sus 2 esquinas y diviendolas entre 2. Luego compara la clau ingresada y 
	 * con condiciones revisa si: 1. la clave es menor que el valor(lo que llevaria al array a cambiar de posicion hacia la siguiente)
	 * 2. la clave es mayor que el valor(lo que llevaria al array a cambiar de posicion hacia la anterior)
	 * 3. la clave es igual al valor(lo que retorna el valor para confirmar que si fue encontrado)
	 * 
	 * @param clau numero asigando por el usuario que se va a buscar en el metodo
	 * @return retorna el valor de la posicion del array(funciona para indicar si fue encontrado o no)
	 */
	int binario (int clau) {
		int posCentre, posInici, posFinal, valorCentral;
		insercion();
		posCentre = 0;
		posInici = 0;
		posFinal = TAM -1;
		while (posInici <= posFinal ) {
			posCentre = (posInici+posFinal)/2;
			valorCentral=arrayEnters[posCentre];
			if (clau == valorCentral) {
				return posCentre;
			}
			else if (clau < valorCentral) {
				posFinal = posCentre - 1;
			}
			else {
				posInici = posCentre + 1;
			}
		}
		return -1;
	}

	/**
	 *comparaEficiencias
	 *
	 * Metodo encargado de comparar las eficiencias del investigador secuancial y binario, consiguiendolo a traves de un bucle for que ejecuta
	 * los 2 metodos anteriormente mencionado, para despues ir sumando cada valor obtenido
	 * (los valores obtenidos son las veces que el la investigacion accedio al array para buscar el numero). Al final los valores obtenidos
	 * son imprimidos en la consola y con una condicion se imprime un mensaje que indica cual de los 2 investigadores son mas eficientes 
	 */
	public void comparaEficiencias() {
		for (int j = 1; j<TAM; j++) {
			rellenarArraysEnters();
			int numsec = secuencial(j, arrayEnters);
			int numbin = binario(j);
			if (numsec != -1) 
				totalSecuencial += numsec+1;
			if (numbin != -1) 
				totalBinario += numbin+1;
		}
		System.out.println("Ejecutando investigadores " + TAM + " veces...");
		System.out.println("<---------------------------->");
		System.out.println("Array Secuencial: ");
		System.out.println("Veces accedidas al array: " + totalSecuencial);
		System.out.println("<---------------------------->");
		System.out.println("Array Binario: ");
		System.out.println("Veces accedidas al array: " + totalBinario);
		System.out.println("<---------------------------->");
		if (totalSecuencial < totalBinario)
			System.out.println("la investigacion 'secuencial' fue mas eficiente en esta ejecucion");
		else
			System.out.println("la investigacion 'binaria' fue mas eficiente en esta ejecucion");
	}

	void seleccion() {
		int clave;
		for(int i = 0; i< TAM; i++){
			for(int j = i+1; j< TAM; j++) {
				if (arrayEnters[i] > arrayEnters[j]) {
					clave = arrayEnters[i];
					arrayEnters[i] = arrayEnters [j];
					arrayEnters[j]= clave;
				}			
			}
		}
	}

	/**
	 * insercion
	 * 
	 * Metodo encargado ordenar los arrays de la siguiente manera:
	 * Lo primero es un for que recorre todos los elementos del array para despues con un bucle while preguntar si en cierta posicion
	 * el primer valor es mayor que el que esta en la posicion indicada. En caso de cer cierto se intercambian de posicion los valores, y en caso de no ser 
	 * asi, entonces se busca en la siguiente posicion, y asi continuamente hasta ordenar el array
	 */
	void insercion () {
		int i, j, clau;
		for (i=1; i < TAM; i++ ) {	//Bucle para recorrer todos los arrays
			j = i;
			clau = arrayEnters [i];
			while ( j > 0 && clau < arrayEnters[j-1]) {	//Encontrador de arrays desordenados
				arrayEnters [j] = arrayEnters [j-1];
				j--;
			}
			arrayEnters[j] = clau;
		}
	}

	void burbuja () {
		for (int i = 0; i < TAM-1; i++) {
			for(int j = i + 1; j < TAM; j++) {
				if (arrayEnters[i] > arrayEnters[j]) {
					int clave = arrayEnters[i];
					arrayEnters[i] = arrayEnters[j];
					arrayEnters[j] = clave;
				}
			}
		}
	}

	void quicksort (int primero, int ultimo) {
		int i, j, central, pivot, tmp;
		central = (primero+ultimo)/2;
		pivot = arrayEnters[central];
		i = primero;
		j = ultimo;
		do {
			while (arrayEnters[i] < pivot) 
				i ++;
			while (arrayEnters[j] > pivot) 
				j --;
			if (i <= j) { 
				tmp = arrayEnters[i];
				arrayEnters[i] = arrayEnters[j];
				arrayEnters[j] = tmp;
				i ++;
				j --;
			}
		}
		while (i<=j);
		if (primero < j) 
			quicksort (primero, j);
		if ( i < ultimo ) 
			quicksort (i, ultimo);
	}

	void shell () { 
		int interval, i, j, k, temp;
		interval = TAM / 2;
		while ( interval > 0 ) {
			for (i=interval; i<TAM; i++) {
				j=i-interval;
				while(j>=0) {
					k=j+interval;
					if(arrayEnters[j] <= arrayEnters[k]) 
						j = -1;
					else {
						temp = arrayEnters[j];
						arrayEnters[j] = arrayEnters[k];
						arrayEnters[k] = temp;
						j -= interval;
					}
				}
			}
			interval = interval / 2;
		}   
	}


	/**
	 * escaner
	 * 
	 *  Metodo que escanea la siguiente linea de codigo y luego retorna el valor escrito por el usuario
	 *  
	 * @return
	 */
	public void eleccionMenu() {
		mostraMenu();
		int numMenu = scanner.nextInt();
		Cases(numMenu);
	}

	/**
	 * mostranumDisponibles
	 * 
	 * Metodo que imprime los numeros generados, dependiendo de la opcion elegida, la cual es leida por el escaner(si la opcion es 1, imprime los numeros)
	 */
	public void mostrarnumDisponibles() {
		System.out.println(" ");
		System.out.println("¿Desea ver los numeros que habian disponibles?");
		System.out.println("1. Si   2. No");
		int condicion = scanner.nextInt();
		if (condicion == 1)
			mostraEnters();
	}

	/**
	 * condicionMenu
	 * 
	 * Metodo encargado de mostrar el menu denuevo
	 * 
	 * @return	retorna el valor de la condicion
	 */
	int condicionMenu() {
		System.out.println(" ");
		System.out.println("¿Desea ver el menu?");
		System.out.println("1. Si   2. No");
		int condicion = scanner.nextInt();
		return condicion;
	}

	/**
	 * rellenarArraysEnter
	 * 
	 * Metodo que rellena todos los espacios del arrayEnters con un for que pasa por todas las posiciones,
	 *  asignandole un numero aleatorio a cada una
	 */
	public void rellenarArraysEnters() {
		for (int i = 0; i < TAM; i++)
			arrayEnters[i] = generaNumAleatori();	
	}

	/**
	 * rellenarArrayCaracters
	 * 
	 * Metodo que rellena todos los espacios del arrayCaracters con un for que pasa por todas las posiciones,
	 * asignandole un caracter aleatorio a cada una
	 */
	public void rellenarArraysCaracters() {
		for (int i = 0; i < TAM; i++)
			arrayCaracters[i] = generaCharAleatori();	
	}

	/**
	 * generaNumAleatori
	 * 
	 * Metodo genera numeros aleatorios con un random
	 * 
	 * @return retorna numeros aleatorios
	 */
	private int generaNumAleatori() {
		Random numero = new Random();
		return (int) (numero.nextInt(30)+1); //Generador de números random
	}

	/**
	 * generaCharAleatori
	 * 
	 * Metodo genera caracteres aleatorios con un random usando el lenguaje ASCII
	 * 
	 * @return retorna numeros aleatorios
	 */
	private char generaCharAleatori() {
		Random caracter = new Random();
		return (char) (caracter.nextInt(97,123)); //Generador de caracteres random
	}
}
