function [ ] = sensor_timegraph( ardu )
%UNTITLED4 Summary of this function goes here
%   Detailed explanation goes here


hx = animatedline(NaN,NaN,'Color','r');
hy = animatedline(NaN,NaN,'Color','b');
legend('y','x');

%schummelfaktor zeitachse
sf=4;

axis([0 80/sf 2.4 3.3]);
dt=0.05;
% verzoeger=dt;

t=0;
while(t<20)
t=t+dt;
x=readVoltage(ardu,'A0');
y=readVoltage(ardu,'A1');
grid on;
title('Sensor Movement');
xlabel('Time in seconds');
ylabel('Digital Value');


    addpoints(hx,t*sf,x);
    addpoints(hy,t*sf,y);
    drawnow limitrate;
    if (mod(t,2000000000)==0)
        drawnow
    end
    
%pause(dt-verzoeger);


end


end

