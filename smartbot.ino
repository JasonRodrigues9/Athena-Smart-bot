#define LED 16
#include <cvzone.h>     //https://github.com/tzapu/WiFiManager
SerialData serialData(1,5);  //Passing 1 arrays with each array having only one value
int valsRec[1];


void setup(){
    Serial.begin(115200);   
    serialData.begin();
    pinMode(16,OUTPUT);
}

void loop(){
serialData.Get(valsRec);
if(valsRec[1]==0){
  digitalWrite(16,HIGH);
}
else{
  digitalWrite(16,HIGH);
  delay(500);
  digitalWrite(16,LOW);
  delay(500);
}
}