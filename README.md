# ProvisoAdvisor  

#### CS 360 Research Project - Jackson Baldwin, Bryan Frahm, Nyah Nelson - 5/14/2023
  
## Overview  
  
ProvisoAdvisor is a college advising site specifically intended to be used by CS majors at the University of Idaho. Using information about what skills you hope to learn in the future or what company you would like to work for, creates a graph of recommended classes for you to take.  
  
## Usage  
  
- Create an account 
- Select a dream job yhou wish to focus on
- Select a company you're interested in working for
- Select specific skills if none of the companies appeal to you
- Add the classes you've taken in the past
- Click the *Generate graphs* button at the bottom of the page to view your recommended major and minor schedule  
  
## Server Setup  
  
- The web interface was created in Laravel, and is completely contained within the *ProvisoLaravel* directory.  
  - The login system and dashboard rely on having the provisoadvising database set up in phpMyAdmin. We have not created a migration for these tables, instead create an empty database in phpMyAdmin called **provisoadvising** and import the *DatabaseSetup.sql* file found at the top level of the repository.  
&nbsp;  
  
- The graph generation scripts are in the *Controllers* folder, more specifically, *ProvisoLaravel -> app -> Http -> Controllers -> GraphController*.
-The graph generation requires installation of grapviz, found here:
  - **graphviz 0.20.1**: run `pip install graphviz`.  
&nbsp;  
 