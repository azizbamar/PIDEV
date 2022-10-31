#ifndef PRODUIT_H
#define PRODUIT_H
#include <QString>
#include <QSqlQuery>
#include <QSqlQueryModel>

class Produit
{
public:
    Produit();
    Produit(int,int , double,QString);
    int getid();
    QString getcategorie();
    int getqtt_dispo();
    double getprix() ;
    void setid(int) ;
    void setcategorie(QString);
    void setqtt_dispo(int);
    void setprix(double);
    bool ajouter();
   bool supprimer(int);
   QSqlQueryModel* afficher();
   QSqlQueryModel* trie_ID() ;
   bool modifier();


private:
    int id, qtt_dispo ;
    QString categorie;
    double prix ;



};

#endif // PRODUIT_H
