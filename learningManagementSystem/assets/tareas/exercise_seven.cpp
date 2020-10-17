#include<iostream>

using namespace std;

int main(){
	float practice,theoretical,participation,finalNote = 0;
	
	cout<<"Enter the practice note: "; cin>>practice;
	cout<<"Enter the theoretical note: "; cin>>theoretical;
	cout<<"Enter the participation note: "; cin>>participation;
	
	practice *= 0.30;
	theoretical *= 0.60;
	participation *= 0.10;
	
	finalNote = practice + theoretical + participation;
	
	cout.precision(2);
	
	cout<<"\nThe final note is: "<<finalNote;
	
	return 0;
}
