package algoritmo_voltaje;

import java.util.Scanner;

/**
 *
 * @author Brayan Gomez
 */
public class Algoritmo_voltaje {

    public static void main(String[] args) {
        
        Scanner entrada = new Scanner(System.in); 
        int cantidad_mediciones = 5;
        int suma = 0;    
        int numeros[] = new int[5];

        for(int i=0; i<cantidad_mediciones; i++){
            System.out.print((i+1)+" Digite el valor del voltaje: ");
            numeros[i] = entrada.nextInt();
            suma += numeros[i];
        }
        
        int promedio = suma / cantidad_mediciones;
          
        for(int i:numeros){
            if(i < promedio){
                System.out.println("\nDato del vector que estan por debajo del promedio: ");
                System.out.println(i);
            }
            
            if(i > promedio){
                System.out.println("\nDato del vector que estan por encima del promedio: ");
                System.out.println(i);
            }
        }
                
        System.out.println("\nLa media es: "+ promedio);
        
    }
    
}
