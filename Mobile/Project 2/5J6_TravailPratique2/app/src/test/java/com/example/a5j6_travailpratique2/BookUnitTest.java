package com.example.a5j6_travailpratique2;

import org.junit.Test;

import static org.junit.Assert.*;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.when;

public class BookUnitTest {

    @Test
    public void mockValidAllEmpty() throws Exception {
        GestionBdActivity gestionBdActivity = mock(GestionBdActivity.class);
        when(gestionBdActivity.mockValidAll("","","","","")).thenReturn(false);

        boolean token = gestionBdActivity.mockValidAll("","","","","");

        assertEquals(false,token);
    }

    @Test
    public void mockValidAll() throws Exception {
        GestionBdActivity gestionBdActivity = mock(GestionBdActivity.class);
        when(gestionBdActivity.mockValidAll("TEST1","Test","Jonathan","Documentary","Unit Test")).thenReturn(true);

        boolean token = gestionBdActivity.mockValidAll("TEST1","Test","Jonathan","Documentary","Unit Test");

        assertEquals(true,token);
    }
}
