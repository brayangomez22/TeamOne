#include<iostream>

using namespace std;

int main(){
	float a,b,c,d,result = 0;
	
	cout<<"Enter the value of a: "; cin>>a;
	cout<<"Enter the value of b: "; cin>>b;
	cout<<"Enter the value of c: "; cin>>c;
	cout<<"Enter the value of d: "; cin>>d;
	
	result = a + (b/(c-d));
	
	cout.precision(2);
	
	cout<<"\nThe result is: "<<result;
	
	return 0;
}
