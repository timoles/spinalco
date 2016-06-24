/***************************************
* name:Voltmeter
* function:adjust the potentiometer connected to pin A0, you will see the voltage displayed on the LCD1602 varies accordingly.
***************************************/
//Email: support@sunfounder.com
//Website: www.sunfounder.com
#include <LiquidCrystal.h>
/****************************************************/
const int analogIn1 = A0;//potentiometer attach to A0
const int alalogIn2 = A1;
const int counterNumber = 5;
const int analogOut3 = A3;
const int analogOut4 = A4;
const int btnPin = 8; //Bt attach to digital 8
int sendBits = 0x00;
float val0 = 0;// define the variable as value=0
float val1 = 0;
int critical_cnt0 = 0;
int critical_cnt1 = 0;
int good_cnt0 = 0;
int good_cnt1 = 0;
float offset = 0.16;
const float middle0 = 3.08;
const float middle1 = 2.91;
boolean critical0 = false;
boolean critical1 = false;

/****************************************************/
void setup()
{
  pinMode(btnPin,OUTPUT);
 digitalWrite(btnPin, HIGH); //and HIGH
 
  
  Serial.begin(9600b );//Initialize the serial serial
}
/****************************************************/
boolean calculateOutOfRange0(float val)
{
  if((val>(middle0 + offset)) || (val< (middle0 -offset))){
    //Serial.println(0); //to high
    return true; //is critical
    }
    else{
      return false; //is NOT critical
    }
    //Serial.println(1);} //just right 
    

}

boolean calculateOutOfRange1(float val)
{
  if((val>(middle1 + offset)) || (val< (middle1 -offset))){
    //Serial.println(0); //to high
    return true; //is critical
    }
    else{
      return false; //is NOT critical
    }
    //Serial.println(1);} //just right 
    

}

boolean checkrange0(){
  if(calculateOutOfRange0(val0)){//if critical then
    critical_cnt0++; 
    } else { //if NOT critical then 
    good_cnt0++;}

    if(good_cnt0 >= counterNumber-2){ //if good count 5 then
      critical_cnt0 = 0;
      good_cnt0=0;}

    if(critical_cnt0 >=counterNumber){ //if critical count 5 then
      //Serial.println(1); //--------------------------Send 1 because critical over extended period of time reached 
      return false; //return false because critical
      }else{
        //Serial.println(0);
      return true; } //because fine //--------------------Send 0 because everything is fine
  }

boolean checkrange1(){
  if(calculateOutOfRange1(val1)){//if critical then
    critical_cnt1++; 
    } else { //if NOT critical then 
    good_cnt1++;
    }

    if(good_cnt1 >= counterNumber-2){ //if good count 5 then
      critical_cnt1 = 0;
      good_cnt1 = 0; }

    if(critical_cnt1 >=counterNumber){ //if critical count 5 then
     // Serial.println(1); //--------------------------Send 1 because critical over extended period of time reached 
      return false; //return false because critical
      }else{
        //Serial.println(0);
      return true; } //because fine //--------------------Send 0 because everything is fine
  }
  boolean buttonPressed(){

    if(digitalRead(btnPin)==1){return true;}
      else return false; //Digital 8 
    }
void loop()
{
  sendBits = 0x00;
  val0 = analogRead(A0);//Read the value of the potentiometer to val
  val1 = analogRead(A1);//Read the value of the potentiometer to val

   // Serial.println(val0);
   //analogWrite(A3,val0); //Matlab zeug zu anderem arduino geht noch nicht 
   //analogWrite(A4,val1); //Matlab zeug zu anderem arduino geht noch nicht 
   // Serial.print(digitalRead(btPin));
  ///Serial.println(analogRead(A5));

  
  val0 = val0/1024*5.0;// Convert the data to the corresponding voltage value in a math way
  val1 = val1/1024*5.0;
   
 //Serial.println(val0);

// Serial.println(val1);    
   if(!buttonPressed()){
    sendBits = sendBits | 0x02;} //wenn knopf gedrückt, dann 1
    
//Send 0 if critical
//send 1 if NOT critical
if(sendBits > 0){
  if (checkrange0()){  //if checkrange0 good to go then...
      if(checkrange1()){ //check if checkrange1 good aswell
        sendBits = sendBits | 0x00; //everything is fine here send 0 exit if else 
              }else{sendBits = 0x01 | sendBits;} //checkrange1 failed, send critical -->0
                       }else{sendBits = sendBits | 0x01;}//checkrange0 failed, send critical -->0
                }
  Serial.print (sendBits) ;
//  Serial.println (digitalRead(btnPin));
// Serial.println();
 // Serial.println();
 

  delay(200); //Wait for 200ms
}
