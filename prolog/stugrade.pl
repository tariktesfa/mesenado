grade(Score,a) :- Score >= 90.
grade(Score,b) :- Score > 90, Score >= 80.
grade(Score,c) :- Score < 80,Score >= 65.
grade(Score,d) :- Score < 65, Score >= 50.
grade(Score,f) :- Score < 50.
