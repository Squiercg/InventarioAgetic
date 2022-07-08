list.files()

dados <- read.csv2('teste.csv',header = F)
head(dados)

saida <- paste("('",dados[,1],"' , '",dados[,2],"' , '",dados[,3],"'),",sep='')

write.table(saida, file = "saida.txt", sep = "\t",
            row.names = F,col.names=F,quote=F)



