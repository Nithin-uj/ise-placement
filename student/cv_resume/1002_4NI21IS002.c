#include <stdio.h>
#include <stdlib.h>
#include <time.h>

// Function to print elements of an array from index x to y
void printing(int x, int y, int a[]) {
    for (int i = x; i <= y; i++) {
        printf("%d ", a[i]);
    }
}

int main() {
    int choice, count = 1, n, w;
    
    // Input total data length and window size
    printf("\nEnter total data length: ");
    scanf("%d", &n);
    printf("Enter window size: ");
    scanf("%d", &w);

    int a[100];
    
    // Input the initial data packet
    printf("\nEnter the data packet: ");
    for (int i = 0; i < w; i++)
        scanf("%d", &a[i]);

    int f = 0, e = w - 1; // Variables to represent the start and end of the window

    printf("\nThe current sliding window is ");
    printing(f, e, a);

    // Loop until all data packets are transmitted
    while (count <= n) {
        choice = rand() % 3; // Randomly choose between 0, 1, and 2

        // If choice is 0, acknowledge received
        if (choice == 0) {
            // If count > n - w, then only send remaining packets
            if (count > n - w) {
                printf("\n Acknowledge received for data packet %d", a[f]);
                f++;
                if(f>e){
                	printf("All data packet received successfullt");
                }
                else{
                    printf("\n The current sliding window is ");
		//    printf("f-- %d <=> e-- %d",f,e);
                    printing(f, e, a);
                    }
                    count++;
       
            }
            else { // Send data packet and expand window
                printf("\n Acknowledge received for data packet %d", a[f]);
                f++;
                e++;
                printf("\n Enter the data packet ");
                scanf("%d", &a[e]);
                printf("\n The current sliding window is ");
             //   printf("f-- %d <=> e-- %d",f,e);
                printing(f, e, a);
                count++;
            }
        }
        else if (choice == 1) { // Timeout
            printf("\n Timed out");
            printf("\n The current sliding window is ");
            printing(f, e, a);
        }
        else { // Error in transmission
            printf("\n Error in transmission");
            printf("\n The current sliding window is ");
            printing(f, e, a);
        }
    }
    return 0;
}

